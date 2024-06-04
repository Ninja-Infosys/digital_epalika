<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('building_documentations', function (Blueprint $table) {
            $table->string('land_ward_no')->nullable()->comment('जग्गाको वडा नं');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('building_documentations', function (Blueprint $table) {
            $table->string('land_ward_no');
        });
    }
};
