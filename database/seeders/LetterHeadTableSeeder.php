<?php

namespace Database\Seeders;

use App\Models\Settings\LetterHead;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\View;

class LetterHeadTableSeeder extends Seeder
{
    public function run()
    {
        LetterHead::truncate();

        LetterHead::create([
            'header'=>(String)View::make('admin.setting.letter_head.default_header'),
            'letter_head'=>(String)View::make('admin.setting.letter_head.default_letter_head')
        ]);
    }
}
