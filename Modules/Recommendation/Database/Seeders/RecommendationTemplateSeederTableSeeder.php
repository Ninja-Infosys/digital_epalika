<?php

namespace Modules\Recommendation\Database\Seeders;

use App\Traits\StoreSqlInDatabaseTrait;
use Illuminate\Database\Seeder;

class RecommendationTemplateSeederTableSeeder extends Seeder
{
    use StoreSqlInDatabaseTrait;
    public function run()
    {
        $this->storeSql(storage_path('app/sql/Recommendation/recommendation_templates.sql'));

    }
}
