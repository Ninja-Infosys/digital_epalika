<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up()
    {
        Schema::table('governmental_disability_types', function (Blueprint $table) {
            $table->string('header_color')->nullable()->after('title');
            $table->string('font_color')->nullable()->after('header_color');
            $table->string('raven_background')->nullable()->after('font_color');
        });
    }
    public function down()
    {
        Schema::table('governmental_disability_types', function (Blueprint $table) {
            $table->dropColumn('header_color','font_color','raven_background');
        });
    }
};
