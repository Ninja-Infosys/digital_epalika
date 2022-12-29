<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('complaint_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiscal_year_id')->comment('आर्थिक बर्ष')->constrained();
            $table->string('submission_no')->comment('सबमिशन नं.');
            $table->string('registration_no')->nullable()->comment('दर्ता नम्बर');
            $table->foreignId('lawsuit_nature_id')->nullable()->comment('मुद्दा प्रकृति')->constrained();
            $table->foreignId('complainant_province_id')->nullable()->comment('वादीको प्रदेश')->constrained('provinces');
            $table->foreignId('complainant_district_id')->nullable()->comment('वादीको जिल्ला')->constrained('districts');
            $table->foreignId('complainant_local_body_id')->nullable()->comment('वादीको स्थानीय तह')->constrained('local_bodies');
            $table->integer('complainant_ward_no')->nullable()->comment('वादीको वडा नं');
            $table->string('complainant_tole')->nullable()->comment('वादीको टोल');
            $table->string('complainant_guardian_name')->nullable()->comment('वादीको अभिभावकको नाम');
            $table->string('complainant_relationship')->nullable()->comment('वादीको सम्बन्ध');
            $table->integer('complainant_age')->nullable()->comment('वादीको उमेर');
            $table->string('complainant_name')->nullable()->comment('वादीको नाम');
            $table->foreignId('defendant_province_id')->nullable()->comment('प्रतिवादी प्रदेश')->constrained('provinces');
            $table->foreignId('defendant_district_id')->nullable()->comment('प्रतिवादी जिल्ला')->constrained('districts');
            $table->foreignId('defendant_local_body_id')->nullable()->comment('प्रतिवादी स्थानीय निकाय')->constrained('local_bodies');
            $table->integer('defendant_ward_no')->nullable()->comment('प्रतिवादी वार्ड नं');
            $table->string('defendant_tole')->nullable()->comment('प्रतिवादी टोल');
            $table->string('defendant_guardian_name')->nullable()->comment('प्रतिवादी अभिभावकको नाम');
            $table->string('defendant_relationship')->nullable()->comment('प्रतिवादी सम्बन्ध');
            $table->integer('defendant_age')->nullable()->comment('प्रतिवादी उमेर');
            $table->string('defendant_name')->nullable()->comment('प्रतिवादी नाम');
            $table->string('subject')->comment('विषय');
            $table->string('complaint_detail')->nullable()->comment('विवरण');
            $table->string('date')->nullable()->comment('मिति');
            $table->date('en_date')->nullable()->comment('मिति अंग्रेजी');
            $table->string('applicant_name')->nullable()->comment('आवेदकको नाम');
            $table->string('applicant_phone')->nullable()->comment('आवेदक फोन');
            $table->string('applicant_address')->nullable()->comment('आवेदक ठेगाना');
            $table->string('applicant_signature')->nullable()->comment('आवेदकको हस्ताक्षर');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('complaint_applications');
    }
};
