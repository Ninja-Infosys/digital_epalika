<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('mobile_users', function (Blueprint $table) {
            $table->string('ward_no')->nullable();
        });
    }

    public function down()
    {
        Schema::table('mobile_users', function (Blueprint $table) {
            $table->string('ward_no');
        });
    }
};
