<?php

use Tests\TestCase;
use App\Models\TxnDB\CardBin;

/**
 * CardInfoTest
 * @group CardInfo
 */
class CardInfoTest extends TestCase
{

    public function setUp() :void
    {
        parent::setUp();

        $this->truncateCardBin();
    }

    protected function truncateCardBin()
    {
        CardBin::truncate();
    }

    public function createCardBin() {
        CardBin::create(['bin' => '500478', 'bflag' => 1, 'system_name' => 'cucard']);
        CardBin::create(['bin' => '900478', 'bflag' => 0, 'system_name' => 'cucard']);
        CardBin::create(['bin' => '900999', 'bflag' => 1, 'system_name' => 'testcard']);
    }

    /** @test */
    public function testSuccess()
    {
        # arrange
        $this->createCardBin();

        # action
        $response  = $this->json(
            'POST',
            '/api/card/installment_enable',
            ['pan_six' => '500478']
        );

        # assert
        $response
            ->assertStatus(200)
            ->assertJson(['error_code' => '0000']);
    }

    /** @test */
    public function testFailed1()
    {
        # arrange
        $this->createCardBin();

        # action
        $response  = $this->json(
            'POST',
            '/api/card/installment_enable',
            ['pan_six' => '900478']
        );

        # assert
        $response
            ->assertStatus(200)
            ->assertJson([
                'error_code' => '0002',
                'msg'=> '此信用卡無配合分期付款，按下確認將以一次付清完成交易，請問是否繼續結帳？'
            ]);
    }

    /** @test */
    public function testFailed2()
    {
        # arrange
        $this->createCardBin();

        # action
        $response  = $this->json(
            'POST',
            '/api/card/installment_enable',
            ['pan_six' => '999478']
        );

        # assert
        $response
            ->assertStatus(200)
            ->assertJson([
                'error_code' => '0001',
                'msg' => '此信用卡無配合分期付款，按下確認將以一次付清完成交易，請問是否繼續結帳？'
            ]);
    }

    /** @test */
    public function testFailed3()
    {
        # arrange
        $this->createCardBin();

        # action
        $response  = $this->json(
            'POST',
            '/api/card/installment_enable',
            ['pan_six' => '900999']
        );

        # assert
        $response
            ->assertStatus(200)
            ->assertJson([
                'error_code' => '0001',
                'msg' => '此信用卡無配合分期付款，按下確認將以一次付清完成交易，請問是否繼續結帳？'
            ]);
    }
}
