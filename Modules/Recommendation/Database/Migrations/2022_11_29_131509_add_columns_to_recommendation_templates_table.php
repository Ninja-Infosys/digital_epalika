<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up()
    {
        Schema::table('recommendation_templates', function (Blueprint $table) {
            $table->boolean('status')->default(0);
        });
    }


    public function down()
    {
        Schema::table('recommendation_templates', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
