<?php

namespace App\Jobs;

use App\Mail\DynamicMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Queueable;

    private $template;
    private $data;

    /**
     * Create a new job instance.
     */
    public function __construct($template, $data)
    {
        $this->template = $template;
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->data['userEmail'])->send(new DynamicMail($this->template, $this->data));
    }
}
