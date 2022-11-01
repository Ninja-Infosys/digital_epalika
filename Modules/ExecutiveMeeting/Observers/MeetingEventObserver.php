<?php

namespace Modules\ExecutiveMeeting\Observers;

use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;
use Modules\ExecutiveMeeting\Entities\MeetingEvent;

class MeetingEventObserver
{

    public function created(MeetingEvent $meetingEvent): void
    {
        if ($meetingEvent->recurrence->value === 'no_recurrence') {
            return;
        }

        if (!$meetingEvent->meetingEvent()->exists()) {
            $recurrences = [
                'daily' => [
                    'type' => 'day',
                    'function' => 'addDay'
                ],
                'weekly' => [
                    'type' => 'week',
                    'function' => 'addWeek'
                ],
                'monthly' => [
                    'type' => 'month',
                    'function' => 'addMonth'
                ],
                'yearly' => [
                    'type' => 'year',
                    'function' => 'addYear'
                ]
            ];
            $start_date = Carbon::parse($meetingEvent->start_date);
            $en_start_date = Carbon::parse($meetingEvent->en_start_date);
            $end_date = Carbon::parse($meetingEvent->end_date);
            $en_end_date = Carbon::parse($meetingEvent->en_end_date);
            $recurrence = $recurrences[$meetingEvent->recurrence->value];

            if ($recurrence) {
                $recurrenceDates = CarbonPeriod::create($en_start_date, '1 ' . $recurrence['type'], $meetingEvent->en_recurrence_end_date);
                $iMax = count($recurrenceDates);

                for ($i = 0; $i < $iMax; $i++) {
                    $start_date->{$recurrence['function']}();
                    $en_start_date->{$recurrence['function']}();
                    $end_date->{$recurrence['function']}();
                    $en_end_date->{$recurrence['function']}();
                    $meetingEvent->meetingEvents()->create([
                        'event_name' => $meetingEvent->event_name,
                        'recurrence' => $meetingEvent->recurrence,
                        'start_date' => $start_date,
                        'en_start_date' => $en_start_date,
                        'end_date' => $end_date,
                        'en_end_date' => $en_end_date,
                        'event_for' => $meetingEvent->event_for,
                        'url' => $meetingEvent->url,
                        'recurrence_end_date' => $meetingEvent->recurrence_end_date,
                        'en_recurrence_end_date' => $meetingEvent->en_recurrence_end_date,
                        'description' => $meetingEvent->description
                    ]);
                }
            }
        }
    }

    public function updated(MeetingEvent $meetingEvent): void
    {
        if ($meetingEvent->meetingEvent || $meetingEvent->meetingEvents()->exists()) {
            $start_date = Carbon::parse($meetingEvent->getOriginal('start_date'));
            $en_start_date = Carbon::parse($meetingEvent->en_start_date);
            $end_date = Carbon::parse($meetingEvent->end_date);
            $en_end_date = Carbon::parse($meetingEvent->en_end_date);

            //$startTime = Carbon::parse($meetingEvent->getOriginal('start_time'))->diffInSeconds($meetingEvent->start_time, false);
            //$endTime = Carbon::parse($meetingEvent->getOriginal('end_time'))->diffInSeconds($meetingEvent->end_time, false);
            if ($meetingEvent->meetingEvent) {
                $childEvents = $meetingEvent->meetingEvent->meetingEvents()->whereDate('en_start_date', '>', $meetingEvent->getOriginal('en_start_date'))->get();
            } else {
                $childEvents = $meetingEvent->meetingEvents;
            }

            foreach ($childEvents as $childEvent) {
                if ($en_start_date) //$childEvent->en_start_date = Carbon::parse($childEvent->en_start_date)->addSeconds($en_start_date);
                {
                    $childEvent->en_start_date = Carbon::parse($childEvent->en_start_date);
                }
                if ($en_end_date) //$childEvent->end_time = Carbon::parse($childEvent->end_time)->addSeconds($endTime);
                {
                    $childEvent->en_end_date = Carbon::parse($childEvent->en_end_date);
                }
                if ($meetingEvent->isDirty('event_name') && $childEvent->event_name === $meetingEvent->getOriginal('event_name')) {
                    $childEvent->event_name = $meetingEvent->event_name;
                }
                if ($meetingEvent->isDirty('description') && $childEvent->description === $meetingEvent->getOriginal('description')) {
                    $childEvent->description = $meetingEvent->description;
                }
                $childEvent->saveQuietly();
            }
        }

//        if($meetingEvent->isDirty('recurrence') && $meetingEvent->recurrence != 'none')
//            self::created($meetingEvent);
    }

    public function deleted(MeetingEvent $meetingEvent): void
    {
        if ($meetingEvent->meetingEvents()->exists()) {
            $meetingEvents = $meetingEvent->meetingEvents()->pluck('id');
        } else if ($meetingEvent->meetingEvent) {
            $meetingEvents = $meetingEvent->meetingEvent->meetingEvents()->whereDate('en_start_date', '>', $meetingEvent->en_start_date)->pluck('id');
        } else {
            $meetingEvents = [];
        }

        MeetingEvent::whereIn('id', $meetingEvents)->delete();
    }
}
