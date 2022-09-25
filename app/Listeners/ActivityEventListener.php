<?php

namespace App\Listeners;

use App\Models\ActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ActivityEventListener
{

    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        if (!app()->runningInConsole()) {
            ActivityLog::create([
                'model_type' => $event->model ?? null,
                'model_id' => $event->model_id ?? null,
                'activity_type' => $event->activity_type,
                'user_id' => auth()->id(),
                'ip' => request()->ip(),
                'agent' => request()->userAgent()
            ]);
        }

    }
}
