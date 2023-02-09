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
            $table->string('identity_type')->nullable()->after('name');
            $table->string('material_name')->nullable()->after('identity_type');
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
            $table->dropColumn('identity_type','material_name');
        });
    }
};
