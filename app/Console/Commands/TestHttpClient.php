<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Components\HttpClient;

class TestHttpClient extends Command
{
    protected $signature = 'http:test';

    protected $description = 'Test Guzzle HTTP client';

    public function handle()
    {
        $httpClient = new HttpClient();

        $post = $httpClient->getPost(5);

        $this->info(json_encode($post, JSON_PRETTY_PRINT));

        return Command::SUCCESS;
    }
}