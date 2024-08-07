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
        Schema::table('map_applies', function (Blueprint $table) {
            $table->string('registration_date_ne')->nullable()->comment('दर्ता मिति बि. सं.');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('map_applies', function (Blueprint $table) {
            $table->string('registration_date_ne');

        });
    }
};
