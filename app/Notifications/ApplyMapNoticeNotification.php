<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Modules\EMap\Entities\ApplyMapNotice;

class ApplyMapNoticeNotification extends Notification
{
    use Queueable;

    public function __construct(public ApplyMapNotice $applyMapNotice)
    {
        //
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'map_apply_id' => $this->applyMapNotice->map_apply_id,
            'file' => $this->applyMapNotice->file,
            'file_type' => $this->applyMapNotice->file_type,
        ];
    }
}
