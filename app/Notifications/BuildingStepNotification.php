<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Modules\EMap\Entities\BuildingDocument;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\BuildingDocumentationStep;
use Modules\EMap\Entities\BuildingFormDataType;
use Modules\EMap\Enums\FormTypeEnum;

class BuildingStepNotification extends Notification
{
    use Queueable;

    public function __construct(public BuildingDocumentation $buildingDocumentation, public BuildingDocumentationStep $form, public BuildingFormDataType $buildingFormDataType, public BuildingDocument $buildingDocument)
    {
        $this->buildingDocument = $buildingDocument->load('documentStatuses');
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }


    public function toArray($notifiable)
    {
        return [
            "शिर्षक" => $this->form->title,
            "स्थिति" => $this->buildingDocument->status->label() ?? '',
            "मिति" => $this->buildingDocument->created_at->toDateString(),
            'प्रकार' => FormTypeEnum::FILE->value,
            'टिप्पणी' => $this->buildingDocument->documentStatuses()->latest()->first()->comment ?? ''
        ];
    }
}
