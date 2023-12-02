<?php

namespace Modules\Circular\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Circular\Entities\Dispatch;

class DispatchEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $dispatch;

    public function __construct(Dispatch $dispatch)
    {
        $this->dispatch = $dispatch;
    }


    public function build()
    {
        return $this->view('circular::admin.dispatch.dispatchEmail');
    }
}
