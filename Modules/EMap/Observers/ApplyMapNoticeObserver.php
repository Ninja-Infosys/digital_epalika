<?php

namespace Modules\EMap\Observers;

use Modules\EMap\Entities\ApplyMapApplication;
use Modules\EMap\Entities\ApplyMapNotice;

class ApplyMapNoticeObserver
{

    public function creating(ApplyMapNotice $applyMapNotice): void
    {
        $appliedApplications = ApplyMapNotice::whereNull('rejected_at')
            ->where('map_apply_id',$applyMapNotice->apply_map_id)
            ->where('file_type', $applyMapNotice->file_type)
            ->get();

        foreach ($appliedApplications as $appliedApplication){
            $appliedApplication->rejected_at = now();
            $appliedApplication->saveQuietly();
        }
    }

    public function updating(ApplyMapNotice $applyMapNotice): void
    {
        $appliedApplications = ApplyMapNotice::whereNull('rejected_at')
            ->where('id','!=',$applyMapNotice->id)
            ->where('map_apply_id',$applyMapNotice->apply_map_id)
            ->where('file_type', $applyMapNotice->file_type)
            ->get();

        foreach ($appliedApplications as $appliedApplication){
            $appliedApplication->rejected_at = now();
            $appliedApplication->saveQuietly();
        }
    }
}
