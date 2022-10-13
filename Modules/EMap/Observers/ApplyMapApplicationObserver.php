<?php

namespace Modules\EMap\Observers;

use Modules\EMap\Entities\ApplyMapApplication;

class ApplyMapApplicationObserver
{

    public function creating(ApplyMapApplication $applyMapApplication): void
    {
        $appliedApplications = ApplyMapApplication::whereNull('rejected_at')->where('file_type', $applyMapApplication->file_type)->get();
        foreach ($appliedApplications as $appliedApplication){
            $appliedApplication->rejected_at = now();
            $appliedApplication->saveQuietly();
        }
    }

    public function updating(ApplyMapApplication $applyMapApplication): void
    {
        $appliedApplications = ApplyMapApplication::whereNull('rejected_at')->where('id','!=',$applyMapApplication->id)->where('file_type', $applyMapApplication->file_type)->get();
        foreach ($appliedApplications as $appliedApplication){
            $appliedApplication->rejected_at = now();
            $appliedApplication->saveQuietly();
        }
    }
}
