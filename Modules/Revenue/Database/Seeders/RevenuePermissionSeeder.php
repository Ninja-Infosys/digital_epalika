<?php

namespace Modules\Revenue\Database\Seeders;

use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class RevenuePermissionSeeder extends Seeder
{
    use StorePermissionTrait;
    public function run()
    {
        $permissions = [
            'invoice_access',
            'invoice_create',
            'invoice_edit',
            'invoice_delete',
            'revenue_access',
            'revenue_create',
            'revenue_edit',
            'revenue_delete',
            'taxPayer_access',
            'taxPayer_create',
            'taxPayer_edit',
            'taxPayer_delete',
            'taxPayerType_access',
            'taxPayerType_create',
            'taxPayerType_edit',
            'taxPayerType_delete',
            'revenueCategory_access',
            'revenueCategory_create',
            'revenueCategory_edit',
            'revenueCategory_delete',
        ];

        $this->storePermission($permissions);
    }
}
