<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('designation_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
            $table->string('level')->nullable();
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('district_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('local_body_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('ward')->nullable();
            $table->string('tole')->nullable();
            $table->string('office')->nullable();
            $table->string('appointment_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->string('pan')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->string('experience')->nullable();
            $table->string('qualification')->nullable();
            $table->string('bank_detail')->nullable();
            $table->string('experience_as_trainee')->nullable();
            $table->string('experience_as_trainer')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainers');
    }
};
