<?php

namespace App\Console\Commands;

use App\Mail\SendDailyWeather;
use App\Models\Subscription;
use App\Services\WeatherApiService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendWeatherEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily email of weather';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(WeatherApiService $weatherApiService): void
    {
        foreach(Subscription::all() as $subscription) {
            $data = $weatherApiService->getCurrentWeather($subscription->name);
            Mail::to($subscription->user->email)->send(new SendDailyWeather($data));
        }
    }
}
