<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('complaint_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiscal_year_id')->constrained();
            $table->foreignId('complainant_province_id')->nullable()->constrained('provinces');
            $table->foreignId('complainant_district_id')->nullable()->constrained('provinces');
            $table->foreignId('complainant_local_body_id')->nullable()->constrained('provinces');
            $table->integer('complainant_ward_no')->nullable();
            $table->string('complainant_tole')->nullable();
            $table->string('complainant_guardian_name')->nullable();
            $table->string('complainant_relationship')->nullable();
            $table->integer('complainant_age')->nullable();
            $table->string('complainant_name')->nullable();
            $table->foreignId('defendant_province_id')->nullable()->constrained('provinces');
            $table->foreignId('defendant_district_id')->nullable()->constrained('provinces');
            $table->foreignId('defendant_local_body_id')->nullable()->constrained('provinces');
            $table->integer('defendant_ward_no')->nullable();
            $table->string('defendant_tole')->nullable();
            $table->string('defendant_guardian_name')->nullable();
            $table->string('defendant_relationship')->nullable();
            $table->integer('defendant_age')->nullable();
            $table->string('defendant_name')->nullable();
            $table->string('subject');
            $table->string('complaint_detail')->nullable();
            $table->string('date')->nullable();
            $table->date('en_date')->nullable();
            $table->string('applicant_name')->nullable();
            $table->string('applicant_phone')->nullable();
            $table->string('applicant_address')->nullable();
            $table->string('applicant_signature')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('complaint_applications');
    }
};
