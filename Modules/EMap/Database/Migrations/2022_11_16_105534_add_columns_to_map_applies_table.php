<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up()
    {
        Schema::table('map_applies', function (Blueprint $table) {
            $table->string('application_type')->nullable()->comment('संस्था');
        });
    }


    public function down()
    {
        Schema::table('map_applies', function (Blueprint $table) {
            $table->dropColumn('application_type');
        });
    }
};
