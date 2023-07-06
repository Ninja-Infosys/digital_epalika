<?php

namespace Modules\Identity\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Identity\Entities\Relationship;

class RelationshipTableSeeder extends Seeder
{
    public function run()
    {
        $relationships = [
            ['title'=>'अन्य'],
            ['title'=>'श्रीमान/ श्रीमति'],
            ['title'=>'दाजु / भाई'],
            ['title'=>'बुबा'],
            ['title'=>'आमा'],
        ];

        foreach ($relationships as $relationship) {
            Relationship::create($relationship);
        }
    }
}
