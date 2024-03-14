<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotifcation extends Notification
{
    use Queueable;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

     public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->data['user_id'],
            'name' => $this->data['name'],
            'jenis_surat' => $this->data['jenis_surat'],
        ];
    }
   
}
