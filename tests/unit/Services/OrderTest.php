<?php


namespace Test\unit\Services;


use PHPUnit\Framework\TestCase;
use Purt09\Bott\Services\Order;

class OrderTest extends TestCase
{
    private $token = '';

    private $bot_id = 1;

    public function testSuccessOrder(): void
    {
        $order = new Order($this->token, $this->bot_id);
        $order->successOrder(2526741, 'TEST');
    }
}