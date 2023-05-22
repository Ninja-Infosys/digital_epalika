<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Modules\Circular\Entities\DispatchDetail;
use Modules\Circular\Entities\Registration;

class DispatchMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public DispatchDetail $dispatchDetail)
    {
        $this->dispatchDetail->load('files');
    }

    public function build()
    {
        return $this->view('emails.circular.dispatch');
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath(public_path($this->dispatchDetail->files->first()->file)),
        ];
    }


}
