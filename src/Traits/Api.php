<?php
declare(strict_types=1);

namespace Purt09\Bott\Traits;

trait Api
{
    static $API_URL = "https://api.bot-t.ru/";

    private function post(string $url, array $params, int $bot_id): array
    {
        $params = array_merge($params, [
            'bot_id' => $bot_id
        ]);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
        $response = curl_exec($curl);
        curl_close($curl);
        if ($response) {
            return json_decode($response, true);
        }
        return [];
    }

    private function get(string $url, array $params = [])
    {
        if (count($params) != 0)
            $url .= '?' . http_build_query($params);
        $response = file_get_contents($url);

        if ($response) {
            return json_decode($response, true);
        }
        return [];
    }

    private function getURL(string $endpoint, string $token, array $swapping = [], $version = 'v1'): string
    {
        $url = self::$API_URL . $version . $endpoint;
        if (!empty($swapping)) {
            $url = vsprintf($url, $swapping);
        }
        $params = [
            'token' => $token
        ];
        $uri = http_build_query($params);
        return $url . '?' . $uri;
    }
}