<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_details', function (Blueprint $table) {
            $table->foreignId('fiscal_year_id')->nullable()->constrained()->nullOnDelete();
            $table->string('registration_no')->nullable();
            $table->string('registration_date_ne')->nullable();
            $table->string('registration_date_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_details', function (Blueprint $table) {
            $table->dropConstrainedForeignId('fiscal_year_id');
            $table->dropColumn(['registration_no', 'registration_date_ne', 'registration_date_en']);
        });
    }
};
