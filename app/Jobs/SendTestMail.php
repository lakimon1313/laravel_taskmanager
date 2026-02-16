<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendTestMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 5;

    public function backoff(): array
    {
        return [5, 15, 60];
    }

    public function __construct(public string $to)
    {
    }

    public function middleware(): array
    {
        return [new RateLimited('mail')];
    }

    public function handle(): void
    {
        if (random_int(1, 5) === 1) {
            throw new \RuntimeException('fail test');
        }

        Mail::raw('Queued test', function ($m) {
            $m->to($this->to)->subject('Queued hello');
        });
    }
}