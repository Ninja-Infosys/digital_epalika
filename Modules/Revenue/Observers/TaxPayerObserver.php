<?php

namespace Modules\Revenue\Observers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Revenue\Entities\TaxPayer;

class TaxPayerObserver
{
    /**
     * @throws \Exception
     */
    public function creating(TaxPayer $taxPayer): void
    {
        $taxPayer->user_id = auth()->id();
        $taxPayer->fiscal_year_id = officeSetting()->fiscal_year_id;
        $taxPayer->registration_no = $this->generateUniqueId(code: $taxPayer->taxPayerType->code);
    }

    /**
     * @throws \Exception
     */
    private function generateUniqueId($table = 'tax_payers', $code = 'TP'): string
    {
        generateUniqueId:
        $unique_id = $code . '-' . officeSetting()->fiscalyear->title . '-' . Str::padLeft(random_int(1, 999999), 6, 0);
        if (DB::table($table)->where('registration_no', $unique_id)->count() > 0) {
            goto generateUniqueId;
        }

        return $unique_id;
    }
}
