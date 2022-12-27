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
        Schema::table('disability_identity_cards', function (Blueprint $table) {
            $table->string('temporary_tole')->nullable()->after('temporary_ward');
            $table->string('permanent_tole')->nullable()->after('permanent_ward');
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
            $table->dropColumn('temporary_tole',
                'permanent_tole');
        });
    }
};
