<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('land_details', function (Blueprint $table) {
            $table->string('former_local_body')->nullable();
            $table->string('road_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('land_details', function (Blueprint $table) {
            $table->dropColumn(['former_local_body', 'road_name']);
        });
    }
};
