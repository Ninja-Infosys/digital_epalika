<?php

namespace Modules\EMap\Events;

use Illuminate\Queue\SerializesModels;

class LandReportLogEvent
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(public $building_documentation_id, public $model_type, public $model_id, public $title, public $description)
    {
        //
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
