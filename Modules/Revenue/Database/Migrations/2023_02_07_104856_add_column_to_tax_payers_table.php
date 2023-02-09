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
    public function up(): void
    {
        Schema::table('tax_payers', function (Blueprint $table) {
            $table->string('occupation')->nullable()->after('address');
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete()->after('occupation');
            $table->foreignId('district_id')->nullable()->constrained()->nullOnDelete()->after('province_id');
            $table->foreignId('local_body_id')->nullable()->constrained()->nullOnDelete()->after('district_id');
            $table->string('village')->nullable()->after('tole');
            $table->string('house_no')->nullable()->after('village');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('tax_payers', function (Blueprint $table) {
            $table->dropColumn(['occupation', 'village', 'house_no']);
            $table->dropConstrainedForeignId('province_id');
            $table->dropConstrainedForeignId('district_id');
            $table->dropConstrainedForeignId('local_body_id');
        });
    }
};
