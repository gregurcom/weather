<?php

declare(strict_types = 1);

namespace App\Console\Commands;

use App\Mail\DailyForecast;
use App\Models\Subscription;
use App\Services\WeatherApiService;
use Illuminate\Console\Command;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendDailyForecast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:email:daily-forecast';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending daily weather forecast to mail';

    public function handle(WeatherApiService $weatherApiService): void
    {
        foreach (Subscription::all() as $subscription) {
            try {
                $data = $weatherApiService->getCurrentWeather($subscription->name);
                Mail::to($subscription->user->email)->send(new DailyForecast($data));
            } catch (RequestException $e) {
                Log::error($e->getMessage());
            }
        }
    }
}
