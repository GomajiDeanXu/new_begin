<?php

namespace Tests\Unit\Services\Card;

use PHPUnit\Framework\TestCase;
use App\Services\Card\Info\CardInfoService;
use Mockery as M;
use App\Models\TxnDB\CardBin;

/**
 * CardInfoServiceTest
 * @group CardInfo
 */
class CardInfoServiceTest extends TestCase
{
    /** @test */
    public function testSuccess()
    {
        # arrange
        $cardBinMock = M::mock(CardBin::class);
        $cardBinMock->shouldReceive('find')->andReturn([
            'bin' => '500001',
            'system_name'=>'cucard',
            'bflag' => 1
        ]);

        $service = new CardInfoService($cardBinMock);

        $cardNo = '500001';
        $expected = ['error_code' => '0000'];

        # action
        $actual = $service->checkInsEnabled($cardNo);

        # assert
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function testFailWithDisabled()
    {
        # arrange
        $cardBinMock = M::mock(CardBin::class);
        $cardBinMock->shouldReceive('find')->andReturn([
            'bin' => '500001',
            'system_name' => 'cucard',
            'bflag' => 0
        ]);

        $service = new CardInfoService($cardBinMock);

        $cardNo = '500001';
        $expected = [
            'error_code' => '0002',
            'msg'   => '此信用卡無配合分期付款，按下確認將以一次付清完成交易，請問是否繼續結帳？'
        ];

        # action
        $actual = $service->checkInsEnabled($cardNo);

        # assert
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function testFailWithNoData()
    {
        # arrange
        $cardBinMock = M::mock(CardBin::class);
        $cardBinMock->shouldReceive('find')->andReturn(null);

        $service = new CardInfoService($cardBinMock);

        $cardNo = '500001';
        $expected = [
            'error_code' => '0001',
            'msg'   => '此信用卡無配合分期付款，按下確認將以一次付清完成交易，請問是否繼續結帳？'
        ];

        # action
        $actual = $service->checkInsEnabled($cardNo);

        # assert
        $this->assertEquals($expected, $actual);
    }
}
