<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewPostToSubscriberMail;

class PostSubscriberMail
{

    public static function handle(Post $post)
    {
        $subscribers = Subscriber::latest()->get('email');

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber)->send(new SendNewPostToSubscriberMail($post));
        }
    }
}
