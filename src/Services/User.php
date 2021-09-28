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
        'ticker' => '/ticker',
    ];

    public function __construct(string $token, int $bot_id)
    {
        $this->token = $token;
        $this->bot_id = $bot_id;
    }

    public function getUsers()
    {

    }
}