<?php

namespace App\Notifications;

use Filament\Notifications\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification as BaseNotification;

class LaporanKinerjaNotification extends BaseNotification
{
    use Queueable;

    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast']; // Atau bisa ditambahkan 'mail' jika ingin mengirim email
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
        ];
    }
}
