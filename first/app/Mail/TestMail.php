<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data = [10, 20, 30, 40, 50];
    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.test')
            ->subject("{$this->user->name}'s Email")
            ->attach(public_path('img.png'), [
                'as' => 'shahin.png',
                'mimes' => 'png'
            ])
            ->with([
                'ourFirstIndex' => $this->data[0]
            ]);
    }
}
