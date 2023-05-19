<?php

namespace Modules\Circular\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Circular\Entities\Dispatch;

trait DispatchTrait
{
    public function getCircularSetting(): object|null
    {
        return DB::table('circular_settings')
            ->whereNull('deleted_at')
            ->latest()
            ->first();
    }
    public function getDispatchNumber(): string
    {

        return $this->getDispatchPrefix() . $this->getDispatchNo();
    }

    public function getDispatchPrefix(): mixed
    {
        return self::getCircularSetting()->dispatch_prefix;
    }

    public function getDispatchNo(): string
    {
        $dispatchData = Dispatch::get();

        if ($dispatchData->isNotEmpty()) {
            $number = $dispatchData->max('dispatch_no') + 1;
        } else {
            $number = self::getCircularSetting()->dispatch_number;
        }

        return Str::padLeft($number, 4, 0);
    }
}
