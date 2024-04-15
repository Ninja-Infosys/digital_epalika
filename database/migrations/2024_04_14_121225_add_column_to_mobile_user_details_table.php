<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('mobile_user_details', function (Blueprint $table) {
            $table->string('reg_no')->nullable();
            $table->boolean('is_minor')->default(false);
            $table->string('gender')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('birth_registration_no')->nullable();


        });
    }

    public function down()
    {
        Schema::table('mobile_user_details', function (Blueprint $table) {
            //
        });
    }
};
