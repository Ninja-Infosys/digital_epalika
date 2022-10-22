<?php

namespace Modules\ExecutiveMeeting\Observers;

use App\Models\ExecutiveMeeting\WardCommittee;

class WardCommitteeObserver
{

    public function creating(WardCommittee $wardCommittee)
    {
        if (is_null($wardCommittee->position)) {
            $wardCommittee->position = WardCommittee::max('position') + 1;
            return;
        }

        $lowerPriorityWardCommittees = WardCommittee::where('position', '>=', $wardCommittee->position)
            ->get();

        foreach ($lowerPriorityWardCommittees as $lowerPriorityWardCommittee) {
            $lowerPriorityWardCommittee->position++;
            $lowerPriorityWardCommittee->saveQuietly();
        }
    }

    public function updating(WardCommittee $wardCommittee)
    {
        if ($wardCommittee->isClean('position')) {
            return;
        }

        if (is_null($wardCommittee->position)) {
            $wardCommittee->position = WardCommittee::max('position');
        }

        if ($wardCommittee->getOriginal('position') > $wardCommittee->position) {
            $positionRange = [
                $wardCommittee->position, $wardCommittee->getOriginal('position')
            ];
        } else {
            $positionRange = [
                $wardCommittee->getOriginal('position'), $wardCommittee->position
            ];
        }

        $lowerPriorityWardCommittees = WardCommittee::whereBetween('position', $positionRange)
            ->where('id', '!=', $wardCommittee->id)
            ->get();

        foreach ($lowerPriorityWardCommittees as $lowerPriorityWardCommittee) {
            if ($wardCommittee->getOriginal('position') < $wardCommittee->position) {
                $lowerPriorityWardCommittee->position--;
            } else {
                $lowerPriorityWardCommittee->position++;
            }
            $lowerPriorityWardCommittee->saveQuietly();
        }
    }

    public function deleting(WardCommittee $wardCommittee)
    {
        $lowerPriorityWardCommittees = WardCommittee::where('position', '>', $wardCommittee->position)
            ->get();

        foreach ($lowerPriorityWardCommittees as $lowerPriorityWardCommittee) {
            $lowerPriorityWardCommittee->position--;
            $lowerPriorityWardCommittee->saveQuietly();
        }
    }
}
