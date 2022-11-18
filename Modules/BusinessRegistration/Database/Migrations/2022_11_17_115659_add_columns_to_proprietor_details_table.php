<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up()
    {
        Schema::table('proprietor_details', function (Blueprint $table) {
            $table->string('business_type')->nullable()->after('name');
        });
    }


    public function down()
    {
        Schema::table('proprietor_details', function (Blueprint $table) {
            $table->dropColumn('business_type');
        });
    }
};
