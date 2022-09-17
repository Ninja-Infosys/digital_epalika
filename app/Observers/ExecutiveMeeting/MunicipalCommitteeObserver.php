<?php

namespace App\Observers\ExecutiveMeeting;

use App\Models\ExecutiveMeeting\MunicipalCommittee;

class MunicipalCommitteeObserver
{

    public function creating(MunicipalCommittee $municipalCommittee)
    {
        if (is_null($municipalCommittee->position)) {
            $municipalCommittee->position = MunicipalCommittee::max('position') + 1;
            return;
        }

        $lowerPriorityMunicipalCommittees = MunicipalCommittee::where('position', '>=', $municipalCommittee->position)
            ->get();

        foreach ($lowerPriorityMunicipalCommittees as $lowerPriorityMunicipalCommittee) {
            $lowerPriorityMunicipalCommittee->position++;
            $lowerPriorityMunicipalCommittee->saveQuietly();
        }
    }

    public function updating(MunicipalCommittee $municipalCommittee)
    {
        if ($municipalCommittee->isClean('position')) {
            return;
        }

        if (is_null($municipalCommittee->position)) {
            $municipalCommittee->position = MunicipalCommittee::max('position');
        }

        if ($municipalCommittee->getOriginal('position') > $municipalCommittee->position) {
            $positionRange = [
                $municipalCommittee->position, $municipalCommittee->getOriginal('position')
            ];
        } else {
            $positionRange = [
                $municipalCommittee->getOriginal('position'), $municipalCommittee->position
            ];
        }

        $lowerPriorityMunicipalCommittees = MunicipalCommittee::whereBetween('position', $positionRange)
            ->where('id', '!=', $municipalCommittee->id)
            ->get();

        foreach ($lowerPriorityMunicipalCommittees as $lowerPriorityMunicipalCommittee) {
            if ($municipalCommittee->getOriginal('position') < $municipalCommittee->position) {
                $lowerPriorityMunicipalCommittee->position--;
            } else {
                $lowerPriorityMunicipalCommittee->position++;
            }
            $lowerPriorityMunicipalCommittee->saveQuietly();
        }
    }

    public function deleting(MunicipalCommittee $municipalCommittee)
    {
        $lowerPriorityMunicipalCommittees = MunicipalCommittee::where('position', '>', $municipalCommittee->position)
            ->get();

        foreach ($lowerPriorityMunicipalCommittees as $lowerPriorityMunicipalCommittee) {
            $lowerPriorityMunicipalCommittee->position--;
            $lowerPriorityMunicipalCommittee->saveQuietly();
        }
    }
}
