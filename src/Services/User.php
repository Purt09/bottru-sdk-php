<?php


namespace Purt09\Bott\Services;


use Purt09\Bott\Traits\Api;
use Purt09\Bott\Interfaces\UserInterface;

class User implements UserInterface
{
    use Api;

    private $token;
    private $bot_id;

    const ENDPOINTS = [
        'addBalance' => '/bot/user/add-balance',
    ];

    public function __construct(string $token, int $bot_id)
    {
        $this->token = $token;
        $this->bot_id = $bot_id;
    }

    public function addBalance(int $user_id, string $sum)
    {
        $url = $this->getURL(self::ENDPOINTS['addBalance'], $this->token);
        $params = [
            'user_id' => $user_id,
            'sum' => $sum
        ];
        return $this->post($url, $params, $this->bot_id);
    }
}