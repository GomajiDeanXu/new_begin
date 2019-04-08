<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB;
use Log;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        DB::listen(function ($query) {
            $bindings   = $query->bindings;
            $execTime  = $query->time;

            # 整理格式
            foreach ($bindings as $i => $binding) {
                if ($binding instanceof \DateTime) {
                    $bindings[$i] = $binding->format('Y-m-d H:i:s');
                } elseif (is_string($binding)) {
                    $bindings[$i] = str_replace("'", "\\'", $binding);
                }
            }

            $execTime = number_format(($execTime/1000.0), 4);
            $sqlString = str_replace(['%', '?', "\n"], ['%%', "'%s'", ' '], $query->sql);
            try {
                $fullString = vsprintf($sqlString, $bindings);
            } catch (\Exception $e) {
                $fullString = '';
                Log::error($e);
            }

            Log::info('執行時間：' . $execTime . PHP_EOL .'SQL 語句：' . $fullString);
        });
    }
}
