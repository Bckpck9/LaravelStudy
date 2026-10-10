<?php

namespace App\Components;
use GuzzleHttp\Client;
class HttpClient
{

    public $client;

    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://jsonplaceholder.typicode.com/posts',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
    }
    
    public function getPost(int $id)
    {
        try {
            $response = $this->client->get("posts/{$id}");

            return json_decode($response->getBody(), true);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            throw $e;
        }
    }
}
