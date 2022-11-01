<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('technical_trainees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->string('photo');
            $table->foreignId('designation_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            ;
            $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            ;
            $table->string('service_time')->nullable();
            $table->string('label')->nullable();
            $table->string('education_qualification')->nullable();
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('district_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            ;
            $table->foreignId('local_body_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            ;
            $table->integer('ward_no')->nullable();
            $table->string('tole')->nullable();
            $table->string('contact_no');
            $table->string('email')->nullable();
            $table->string('responsibility')->nullable();
            $table->string('training')->nullable();
            $table->string('hobby')->nullable();
            $table->string('excellence')->nullable();
            $table->text('learning_subject')->nullable();
            $table->text('expectation')->nullable();
            $table->string('office_name')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('office_email')->nullable();
            $table->string('nomination_letter')->nullable();
            $table->string('recommendation_letter')->nullable();
            $table->boolean('select')->default(0);
            $table->string('reference_id')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('technical_trainees');
    }
};
