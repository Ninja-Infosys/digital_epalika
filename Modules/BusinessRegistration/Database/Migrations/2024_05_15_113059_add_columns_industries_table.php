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
    public function up(): void
    {
        Schema::table('industries', function (Blueprint $table) {
            $table->foreignId('industry_category_id')->nullable()->comment('उधोगको वर्ग')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('', function (Blueprint $table) {
            $table->dropColumn('industry_category_id');
        });
    }
};
