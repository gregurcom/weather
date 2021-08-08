<?php

declare(strict_types = 1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DailyForecast extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array<string>
    */
    public array $data;

    /**
     * Create a new message instance.
     *
     * @param array<string> $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build(): self
    {
        return $this->subject('Daily weather')->view('email.daily_forecast');
    }
}
