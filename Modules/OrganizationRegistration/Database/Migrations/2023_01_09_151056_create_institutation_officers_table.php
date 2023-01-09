<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('institution_officers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institution_id')->comment('संस्था')->constrained();
            //Details of the Managing Officers of the Institution
            $table->string('officer_designation')->comment('पद');
            $table->string('officer_name')->comment('नाम');
            $table->string('officer_citizenship_no')->comment('ना.प्र.प.नं.');
            $table->string('officer_citizenship_issue_date')->comment('ना‌. जारी मिति वि.सं.');
            $table->string('officer_citizenship_issue_date_en')->comment('ना‌. जारी मिति ई.सं.');
            $table->string('officer_citizenship_issue_district')->comment('ना. जारी जिल्ला');
            $table->string('officer_citizenship_issue_current_address')->comment('हालको ठेगाना');
            $table->string('officer_contact_detail')->comment('सम्पर्क विवरण');
            $table->string('officer_photo')->comment('फोटो');
            $table->string('officer_citizenship_front')->comment('नागरिकता (अगाडि)');
            $table->string('officer_citizenship_behind')->comment('नागरिकता (पछाडी) ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('institution_officers');
    }
};
