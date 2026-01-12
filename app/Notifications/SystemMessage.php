<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;


class SystemMessage extends Notification
{
    use Queueable;

    protected $title;
    protected $message;

    // We pass the title and message when we create the notification
    public function __construct($title, $message)
    {
        $this->title = $title;
        $this->message = $message;
    }

    public function via(object $notifiable): array
    {
        // Change this from 'mail' to 'database'
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        // This is what gets saved in the 'data' column of your notifications table
        return [
            'title' => $this->title,
            'message' => $this->message,
            'time' => now()->toDateTimeString(),
        ];
    }
}