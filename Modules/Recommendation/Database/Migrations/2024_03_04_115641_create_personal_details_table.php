<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    public function up()
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no')->nullable();
            $table->string('name');
            $table->string('phone_no')->nullable();
            $table->boolean('is_minor')->default(false);
            $table->string('citizenship_no')->nullable();
            $table->string('gender');
            $table->foreignId('province_id')->nullable()->constrained()->noActionOnDelete();
            $table->foreignId('district_id')->nullable()->constrained()->noActionOnDelete();
            $table->foreignId('local_body_id')->nullable()->constrained()->noActionOnDelete();
            $table->integer('ward_no')->nullable();
            $table->string('tole')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personal_details');
    }
};
