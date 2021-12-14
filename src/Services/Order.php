<?php


namespace Purt09\Bott\Services;


use Purt09\Bott\Interfaces\OrderInterface;
use Purt09\Bott\Traits\Api;

class Order implements OrderInterface
{
    use Api;

    private $token;
    private $bot_id;

    const ENDPOINTS = [
        'successOrder' => '/shop/order/success-order',
        'resetOrder' => '/shop/order/reset-order',
        'sendRequest' => '/shop/order/send-request',
        'sendMessage' => '/shop/order/send-message'
    ];

    public function __construct(string $token, int $bot_id)
    {
        $this->token = $token;
        $this->bot_id = $bot_id;
    }

    public function successOrder(int $order_id, string $product = '')
    {
        $url = $this->getURL(self::ENDPOINTS['successOrder'], $this->token);
        $params = [
            'order_id' => $order_id,
            'product' => $product
        ];
        return $this->post($url, $params, $this->bot_id);
    }

    public function resetOrder(int $order_id)
    {
        $url = $this->getURL(self::ENDPOINTS['resetOrder'], $this->token);
        $params = [
            'order_id' => $order_id
        ];
        return $this->post($url, $params, $this->bot_id);
    }

    public function sendRequest(int $order_id, string $method, array $params)
    {
        $url = $this->getURL(self::ENDPOINTS['sendRequest'], $this->token);
        $params = [
            'order_id' => $order_id,
            'method' => $method,
            'params' => $params,
        ];
        return $this->post($url, $params, $this->bot_id);
    }

    public function sendMessage(int $order_id, int $message_id)
    {
        $url = $this->getURL(self::ENDPOINTS['sendMessage'], $this->token);
        $params = [
            'order_id' => $order_id,
            'message_id' => $message_id,
        ];
        return $this->post($url, $params, $this->bot_id);
    }
}