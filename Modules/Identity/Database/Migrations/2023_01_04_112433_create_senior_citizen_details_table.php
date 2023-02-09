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
            $table->string('name')->nullable()->comment('नाम');
            $table->string('name_en')->nullable()->comment('नाम अग्रेजीमा');
            $table->string('dob_bs')->nullable()->comment('जन्म मिति (वि.स.)');
            $table->string('card_no')->nullable()->comment('कार्ड नं.');
            $table->string('gender')->comment('लिङ्ग');
            $table->string('citizenship_no')->nullable()->comment('नागरिता नं.');
            $table->string('issue_date_bs')->nullable()->comment('जारी मिति (वि.स.)');
            $table->string('spouse')->comment('पति/पत्नीको नाम');
            $table->string('spouse_en')->nullable()->comment('पति/पत्नीको नाम अग्रेजीमा');
            $table->string('blood_group')->nullable()->comment('रक्त समूह');
            $table->string('father_name')->nullable()->comment('बुवाको नाम');
            $table->string('father_name_en')->nullable()->comment('बुवाको नाम अग्रेजीमा');
            $table->string('mother_name_en')->nullable()->comment('आमाको नाम अग्रेजीमा');
            $table->string('mother_name')->nullable()->comment('आमाको नाम');
            $table->foreignId('province_id')->nullable()->comment('प्रदेश')->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('district_id')->nullable()->comment('जिल्ला')->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('local_body_id')->nullable()->comment('पालिका')->constrained()->nullOnDelete()->onUpdate('no action');
            $table->integer('ward_no')->nullable()->comment('वडा नं.');
            $table->string('tole')->nullable()->comment('टोल');
            $table->string('patrons_name')->nullable()->comment('संरक्षकको नाम');
            $table->string('patrons_name_en')->nullable()->comment('संरक्षकको नाम अग्रेजीमा');
            $table->string('patrons_name_address')->nullable()->comment('संरक्षकको ठेगाना');
            $table->string('contact_person_name')->nullable()->comment('सम्पर्क व्यक्ति नाम');
            $table->string('contact_person_name_en')->nullable()->comment('सम्पर्क व्यक्ति नाम अग्रेजीमा');
            $table->string('contact_person_phone')->nullable()->comment('सम्पर्क व्यक्तिको सम्पर्क नं');
            $table->string('contact_person_address')->nullable()->comment('सम्पर्क व्यक्तिको ठेगाना');
            $table->boolean('is_disease')->default(0);
            $table->string('disease_name')->nullable()->comment('रोगको नाम');
            $table->longText('description')->nullable()->comment('हेरचाह केन्द्रको विवरण');
            $table->longText('description_en')->nullable()->comment('हेरचाह केन्द्रको विवरण अग्रेजीमा');
            $table->boolean('is_medicine')->default(0);
            $table->string('medicine_name')->nullable()->comment('औषधिको नाम');
            $table->foreignId('employee_signature_id')->nullable()->comment('हस्ताक्षर')->constrained()->nullOnDelete()->onUpdate('no action');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('senior_citizen_details');
    }
};
