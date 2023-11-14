<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Send extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send user and pass to another link';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $schedule->call(function () {
            $httpClient = new \GuzzleHttp\Client();
             $httpClient->post('http://127.0.0.1:8000/api/Test', [
                'query' => [
                    'user' => '11111',
                    'pass' => '22222',
                ],
            ]);
            // $statusCode = $response->getStatusCode();
            // Process the response as per your requirements
            // For example, you can log the status code or perform further actions
            // \log()::info('Request to https://onbocash.com/Ocash.html completed with status code: ' . $statusCode);
        // })->everyMinute();
    }
}
