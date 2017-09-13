<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterConfirm extends Mailable
{
    use Queueable, SerializesModels;

    protected $user_name;
    protected $confirm_url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_name, $confirm_url)
    {
        //
        $this->user_name = $user_name;
        $this->confirm_url = $confirm_url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.confirm_email')
                    ->with([
                        'name'=> $this->user_name,
                        'confirm_url'=> $this->confirm_url,
                    ]);
    }
}
