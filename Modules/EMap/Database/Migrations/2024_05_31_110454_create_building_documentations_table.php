<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('building_documentations', function (Blueprint $table) {
            $table->id();
            $table->integer('reg_no')->default(0);
            $table->string('submission_no')->nullable()->comment('सबमिशन नम्बर');
            $table->foreignId('fiscal_year_id')->nullable()->comment('आर्थिक बर्ष')->constrained()->nullOnDelete();
            $table->string('registration_no')->nullable()->comment('दर्ता नम्बर');
            $table->string('registration_date_ne')->nullable()->comment('दर्ता मिति बि. सं.');
            $table->string('registration_date_en')->nullable()->comment('दर्ता मिति ई. सं.');
            $table->string('house_owner_name')->nullable()->comment('घरधनिको नाम');
            $table->string('applicant_name')->nullable()->comment('निवेदकको नाम');
            $table->string('application_date')->nullable()->comment('निवेदन दिएको मिति');
            $table->foreignId('province_id')->nullable()->comment('प्रदेश')->constrained();
            $table->foreignId('district_id')->nullable()->comment('जिल्ला')->constrained();
            $table->foreignId('local_body_id')->nullable()->comment('पालिका')->constrained();
            $table->string('ward_no')->nullable()->comment('वडा नं');
            $table->string('tole')->nullable()->comment('गाउ/टोल');
            $table->string('former_district')->nullable()->comment('साविक जिल्ला');
            $table->string('former_local_body')->nullable()->comment('साविक पालिका');
            $table->string('former_ward_no')->nullable()->comment('साविक वडा नं');
            $table->string('applicant_former_district')->nullable()->comment('निवेदकको साविक जिल्ला');
            $table->string('applicant_former_local_body')->nullable()->comment('निवेदकको साविक पालिका');
            $table->string('applicant_former_ward_no')->nullable()->comment('निवेदकको साविक वडा नं');
            $table->string('citizenship_no')->nullable()->comment('निवेदकको ना.प्र.नं');
            $table->string('phone')->nullable()->comment('निवेदकको सम्पर्क नं');
            $table->string('plot_no')->nullable()->comment('कित्ता नं');
            $table->string('land_area')->nullable()->comment('जग्गाको क्षेत्रफल');
            $table->string('house_built_year')->nullable()->comment('घर निर्माण गर्न सुरु गरेको वर्ष');
            $table->string('room')->nullable()->comment('कोठा');
            $table->string('storey')->nullable()->comment('तल्ला');
            $table->string('area')->nullable()->comment('घरको क्षेत्रफल');
            $table->string('building_category')->nullable()->comment('घरको वर्गीकरण');
            $table->string('length')->nullable()->comment('भवनको लम्बाई');
            $table->string('breadth')->nullable()->comment('भवनको चौडाइ');
            $table->string('height')->nullable()->comment('भवनको उचाइ');
            $table->string('road_jurisdiction')->nullable()->comment('सडक अधिकार क्षेत्र');
            $table->string('land_detail')->nullable()->comment('जग्गा विबरण');
            $table->string('bill_no')->nullable()->comment('बिल नं.');
            $table->string('bill_date_bs')->nullable()->comment('बिल मिति बि स.');
            $table->string('bill_date_ad')->nullable()->comment('बिल मिति ई स.');
            $table->double('amount', 12, 2)->nullable()->default(0)->comment('रकम');
            $table->string('taxpayer_number')->nullable()->comment('करदाता नम्बर');
            $table->string('other')->nullable()->comment('अन्य');
            $table->string('other_file')->nullable()->comment('वडामा बुझाउनु पर्ने अन्य करहरु बुझाएको प्रमाण ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('building_documentations');
    }
};
