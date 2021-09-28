<?php


namespace Test\unit\Services;


use PHPUnit\Framework\TestCase;
use Purt09\Bott\Services\Order;

class OrderTest extends TestCase
{
    private $token = '';

    private $bot_id = 1;

//    public function testSuccessOrder(): void
//    {
//        $order = new Order($this->token, $this->bot_id);
//        $result = $order->successOrder(2526788, 'TEST');
//        var_dump($result);
//    }

    public function testSendRequest(): void
    {
        $order = new Order($this->token, $this->bot_id);
        $params = [
            'text' => "Информация по заказу #2526788 \r\n TEST",
        ];
        $result = $order->sendRequest(2526788, 'sendMessage', $params);
    }
}