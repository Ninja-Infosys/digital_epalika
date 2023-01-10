<?php

namespace Modules\OrganizationRegistration\Observers;

use Modules\Grant\Traits\UniqueIdTrait;
use Modules\OrganizationRegistration\Entities\Institution;

class InstitutionObserver
{
    use UniqueIdTrait;
    public function created(Institution $institution): void
    {
        //
    }

    public function creating(Institution $institution): void
    {
        $institution->user_id=auth()->id();
        $institution->registration_id=$this->generateUniqueId($institution, 'institutions', 'GM/');
    }

    public function updated(Institution $institution): void
    {
        //
    }

    public function updating(Institution $institution): void
    {
        //
    }

    public function deleted(Institution $institution): void
    {
        //
    }

    public function restored(Institution $institution): void
    {
        //
    }

    public function forceDeleted(Institution $institution): void
    {
        //
    }
}
