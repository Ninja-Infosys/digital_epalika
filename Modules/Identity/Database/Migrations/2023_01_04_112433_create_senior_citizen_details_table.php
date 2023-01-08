<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('senior_citizen_details', function (Blueprint $table) {
            $table->id();
            $table->longText('photo')->nullable();
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->string('dob_bs')->nullable();
            $table->string('card_no')->nullable();
            $table->string('gender');
            $table->string('citizenship_no')->nullable();
            $table->string('issue_date_bs')->nullable();
            $table->string('spouse');
            $table->string('spouse_en')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_name_en')->nullable();
            $table->string('mother_name_en')->nullable();
            $table->string('mother_name')->nullable();
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('district_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('local_body_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->integer('ward_no')->nullable();
            $table->string('tole')->nullable();
            $table->string('patrons_name')->nullable();
            $table->string('patrons_name_en')->nullable();
            $table->string('patrons_name_address')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_name_en')->nullable();
            $table->string('contact_person_phone')->nullable();
            $table->string('contact_person_address')->nullable();
            $table->boolean('is_disease')->default(0);
            $table->string('disease_name')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_en')->nullable();
            $table->boolean('is_medicine')->default(0);
            $table->string('medicine_name')->nullable();
            $table->foreignId('employee_signature_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('senior_citizen_details');
    }
};
