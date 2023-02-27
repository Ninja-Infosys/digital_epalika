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
        $table->foreignId('fiscal_year_id')->nullable()->comment('आर्थिक वर्ष')->constrained()->nullOnDelete()->onUpdate('no action');
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
            $table->dropConstrainedForeignId('fiscal_year_id');
        });
    }
};
