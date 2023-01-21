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
        Schema::table('disability_identity_cards', function (Blueprint $table) {
            $table->string('is_citizenship')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disability_identity_cards', function (Blueprint $table) {
        $table->dropColumn('is_citizenship');
        });
    }
};
