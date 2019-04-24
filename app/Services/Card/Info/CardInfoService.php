<?php

namespace App\Services\Card\Info;

use App\Models\TxnDB\CardBin;

class CardInfoService
{
    protected $cardBin;

    public function __construct(CardBin $cardBin)
    {
        $this->cardBin = $cardBin;
    }

    public function checkInsEnabled(String $cardPrefix)
    {
        $cardInfo = $this->cardBin->find($cardPrefix);

        if (array_get($cardInfo, 'system_name', '') !== 'cucard') {
            return [
                'error_code' => '0001',
                'msg'   => '此信用卡無配合分期付款，按下確認將以一次付清完成交易，請問是否繼續結帳？'
            ];
        }

        if (array_get($cardInfo, 'bflag') !== 1) {
            return [
                'error_code' => '0002',
                'msg'   => '此信用卡無配合分期付款，按下確認將以一次付清完成交易，請問是否繼續結帳？'
            ];
        }

        return [
            'error_code' => '0000'
        ];
    }
}
