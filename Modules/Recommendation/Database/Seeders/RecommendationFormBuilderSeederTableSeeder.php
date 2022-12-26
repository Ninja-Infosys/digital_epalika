<?php

namespace Modules\Recommendation\Database\Seeders;

use App\Traits\StoreSqlInDatabaseTrait;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecommendationFormBuilderSeederTableSeeder extends Seeder
{
    use StoreSqlInDatabaseTrait;
    public function run()
    {
        $this->storeSql(storage_path('app/sql/Recommendation/form_builders.sql'));
    }
}
