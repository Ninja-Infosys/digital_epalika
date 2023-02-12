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
        Schema::table('registration_details', function (Blueprint $table) {
            $table->string('date_ne')->nullable()->comment('नेपाली मिति');
            $table->string('date_en')->nullable()->comment('अंग्रेजी मिति');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registration_details', function (Blueprint $table) {
            $table->dropColumn('date_ne', 'date_en');
        });
    }
};
