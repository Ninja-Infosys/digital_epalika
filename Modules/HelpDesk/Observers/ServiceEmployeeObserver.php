<?php

namespace Modules\HelpDesk\Observers;

use Modules\HelpDesk\Entities\ServiceEmployee;

class ServiceEmployeeObserver
{
    public function creating(ServiceEmployee $serviceEmployee)
    {
        if (is_null($serviceEmployee->position)) {
            $serviceEmployee->position = ServiceEmployee::max('position') + 1;
            return;
        }

        $lowerPriorityServiceEmployees = ServiceEmployee::where('position', '>=', $serviceEmployee->position)
            ->get();

        foreach ($lowerPriorityServiceEmployees as $lowerPriorityServiceEmployee) {
            $lowerPriorityServiceEmployee->position++;
            $lowerPriorityServiceEmployee->saveQuietly();
        }
    }

    public function updating(ServiceEmployee $serviceEmployee)
    {
        if ($serviceEmployee->isClean('position')) {
            return;
        }

        if (is_null($serviceEmployee->position)) {
            $serviceEmployee->position = ServiceEmployee::max('position');
        }

        if ($serviceEmployee->getOriginal('position') > $serviceEmployee->position) {
            $positionRange = [
                $serviceEmployee->position, $serviceEmployee->getOriginal('position')
            ];
        } else {
            $positionRange = [
                $serviceEmployee->getOriginal('position'), $serviceEmployee->position
            ];
        }

        $lowerPriorityServiceEmployees = ServiceEmployee::whereBetween('position', $positionRange)
            ->where('id', '!=', $serviceEmployee->id)
            ->get();

        foreach ($lowerPriorityServiceEmployees as $lowerPriorityServiceEmployee) {
            if ($serviceEmployee->getOriginal('position') < $serviceEmployee->position) {
                $lowerPriorityServiceEmployee->position--;
            } else {
                $lowerPriorityServiceEmployee->position++;
            }
            $lowerPriorityServiceEmployee->saveQuietly();
        }
    }

    public function deleting(ServiceEmployee $serviceEmployee)
    {
        $lowerPriorityServiceEmployees = ServiceEmployee::where('position', '>', $serviceEmployee->position)
            ->get();

        foreach ($lowerPriorityServiceEmployees as $lowerPriorityServiceEmployee) {
            $lowerPriorityServiceEmployee->position--;
            $lowerPriorityServiceEmployee->saveQuietly();
        }
    }

}
