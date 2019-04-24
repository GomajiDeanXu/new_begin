<?php

namespace App\Models\TxnDB;

use Illuminate\Database\Eloquent\Model;

class CardBin extends Model
{
    // /**
    //  * Set the value of the "created at" attribute.
    //  *
    //  * @param  mixed  $value
    //  * @return $this
    //  */
    // public function setCreatedAt($value)
    // {
    //     $this->{static::CREATED_AT} = $value->timestamp;

    //     return $this;
    // }

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'create_ts';

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bin',
        'system_name',
        'flag',
        // 'create_ts',
        'bflag'
    ];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'transaction';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'card_bin';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'bin';

    /**
     * Set the value of the "updated at" attribute.
     *
     * @param  mixed  $value
     * @return $this
     */
    public function setUpdatedAt($value)
    {
        return $this;
    }
}
