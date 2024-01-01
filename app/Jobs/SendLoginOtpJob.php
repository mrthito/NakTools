<?php

namespace App\Jobs;

use App\Helpers\SmsHelper;
use App\Models\Common\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendLoginOtpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user, public string $otp)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        (new SmsHelper())->sendOtp($this->user->phone, $this->otp);
    }
}
