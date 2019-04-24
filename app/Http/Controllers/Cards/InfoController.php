<?php

namespace App\Http\Controllers\Cards;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Services\Card\Info\CardInfoService;
use Log;

class InfoController extends BaseController
{
    protected $cardInfoService;

    public function __construct(CardInfoService $cardInfoService)
    {
        $this->cardInfoService = $cardInfoService;
    }

    public function checkInsEnabled(Request $request) {
        $cardNo = $request->input('pan_six');

        if (is_null($cardNo)) {
            return [
                'error_code' => '0005',
                'msg'   => '卡號前六碼未帶入'
            ];
        }

        try {
            $result = $this->cardInfoService->checkInsEnabled($cardNo);

            return response()->json($result);

        } catch (\Exception $e) {
            Log::error($e);

            return response()->json([
                'error_code' => '9999',
                'msg'        => '未知錯誤'
            ]);
        }
    }

}
