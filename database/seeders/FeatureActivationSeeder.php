<?php

namespace Database\Seeders;

use App\Enums\FeatureTypeEnum;
use App\Models\FeatureActivation;
use Illuminate\Database\Seeder;

class FeatureActivationSeeder extends Seeder
{
    public function run()
    {
        FeatureActivation::truncate();
        $data = [
            [
                'feature_name_ne' => 'आकाश एस.एम.एस.',
                'feature_name_en' => 'Aakash Sms',
                'feature_key' => 'aakash_sms',
                'feature_status' => false,
                'feature_type' => FeatureTypeEnum::SMS->value,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'feature_name_ne' => 'समय एस.एम.एस.',
                'feature_name_en' => 'Samaya Sms',
                'feature_key' => 'samaya_sms',
                'feature_status' => false,
                'feature_type' => FeatureTypeEnum::SMS->value,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'feature_name_ne' => 'ई-मेल',
                'feature_name_en' => 'Email',
                'feature_key' => 'email',
                'feature_status' => false,
                'feature_type' => FeatureTypeEnum::MAIL->value,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        FeatureActivation::insert($data);
    }
}
