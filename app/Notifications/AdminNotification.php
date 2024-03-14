<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdminNotification extends Notification
{
    use Queueable;
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
   public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->data['user_id'],
            'name' => $this->data['name'],
            'jenis_surat' => $this->data['jenis_surat'],
        ];
    }
}
