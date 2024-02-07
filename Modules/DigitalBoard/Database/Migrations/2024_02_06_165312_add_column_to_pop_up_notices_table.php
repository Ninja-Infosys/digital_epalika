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
        Schema::table('pop_up_notices', function (Blueprint $table) {
            $table->string('is_displayed')->default(false);
           
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pop_up_notices', function (Blueprint $table) {
            $table->string('is_displayed');
            $table->foreignId('user_id');
            
        });
    }
};
