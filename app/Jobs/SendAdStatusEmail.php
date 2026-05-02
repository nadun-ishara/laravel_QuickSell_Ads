<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendAdStatusEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $ad;
    public $status;
    public $messageBody;

    /**
     * Create a new job instance.
     */
    public function __construct($ad, $status, $messageBody)
    {
        $this->ad = $ad;
        $this->status = $status;
        $this->messageBody = $messageBody;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::raw($this->messageBody, function($message){
            $message->to($this->ad->user->email)
                    ->subject("Ad {$this->status} - Ads Platform");
        });
    }
}
