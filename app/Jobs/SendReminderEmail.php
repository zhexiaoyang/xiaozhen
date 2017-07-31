<?php

namespace App\Jobs;

use App\Admin;
use App\Jobs\Job;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReminderEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $admin;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $admin = $this->admin;
        $mailer->send('emails.adminlogin',['name'=>$admin->name],function($message) use ($admin){
            $message->to($admin->email)->subject('登录提醒');
        });
    }
}
