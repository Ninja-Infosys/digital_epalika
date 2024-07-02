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
            $table->foreignId('organization_id')->nullable()->constrained()->nullOnDelete();
            $table->string('submission_no')->nullable()->comment('सबमिशन नम्बर');
            $table->foreignId('fiscal_year_id')->nullable()->comment('आर्थिक बर्ष')->constrained()->nullOnDelete();
            $table->string('registration_no')->nullable()->comment('दर्ता नम्बर');
            $table->string('registration_date')->nullable()->comment('दर्ता मिति बि. सं.');
            $table->string('former_local_body')->nullable()->comment('जग्गाको साविक पालिका');
            $table->string('former_ward_no')->nullable()->comment('जग्गाको साविक वडा नं');
            $table->string('land_ward_no')->nullable()->comment('जग्गाको वडा नं');
            $table->string('plot_no')->nullable()->comment('जग्गाको कित्ता नं');
            $table->string('land_area')->nullable()->comment('जग्गाको क्षेत्रफल');
            $table->string('land_tole')->nullable()->comment('जग्गाको रहेको टोल');
            $table->string('house_built_year')->nullable()->comment('घर निर्माण गर्न सुरु गरेको वर्ष');
            $table->string('applicant_name')->nullable()->comment('निवेदकको नाम');
            $table->string('applicant_type')->nullable()->comment('निवेदकको प्रकार');
            $table->string('applicant_signature')->nullable()->comment('निवेदकको हस्ताक्षर');
            $table->foreignId('province_id')->nullable()->comment('निवेदकको प्रदेश')->constrained();
            $table->foreignId('district_id')->nullable()->comment('निवेदकको जिल्ला')->constrained();
            $table->foreignId('local_body_id')->nullable()->comment('निवेदकको पालिका')->constrained();
            $table->string('applicant_ward_no')->nullable()->comment('घरधनिको वडा नं');
            $table->string('applicant_tole')->nullable()->comment('निवेदकको टोल');
            $table->string('applicant_phone_no')->nullable()->comment('निवेदकको सम्पर्क नं.');
            $table->string('applicant_age')->nullable()->comment('निवेदकको उमेर');
            $table->string('application_date')->nullable()->comment('निवेदन दिएको मिति');
            $table->string('building_usage')->nullable()->comment('निर्माणको प्रयोजन');
            $table->string('field_land_area')->nullable()->comment('जग्गाको वास्तविक क्षेत्रफल');
            $table->string('plinth_area')->nullable()->comment('भवनको प्लिनथको क्षेत्रफल');
            $table->string('other_construction_area_new')->nullable()->comment('ढाकेको क्षेत्रफल');
            $table->string('other_construction_area_old')->nullable()->comment('ढाकिसकेको क्षेत्रफल');
            $table->string('total_area')->nullable()->comment('जम्मा क्षेत्रफल');
            $table->string('current_storey')->nullable()->comment('भवनको तल्ला');
            $table->string('height')->nullable()->comment('भवनको उचाइ');
            $table->string('building_category')->nullable()->comment('निर्माणको किसिम');
            $table->string('roof_category')->nullable()->comment('छानाको किसिम');
            $table->string('set_back')->nullable()->comment('जग्गाबाट सडकको केनद्रबिन्दु');
            $table->string('consultant_engineer_signature')->nullable()->comment('सहि');
            $table->string('consultant_engineer_name')->nullable()->comment('नाम');
            $table->string('consultant_engineer_post')->nullable()->comment('पद');
            $table->string('consultancy_name')->nullable()->comment('कन्सलटिङ फर्मको नाम');
            $table->string('consultancy_registration_no')->nullable()->comment('न.प.मा सूचिक्रत भएको व्यवसाय प्रमाण पत्रको नं.');
            $table->string('consultancy_stamp')->nullable()->comment('फर्मको छाप');
            $table->string('n_e_c_registration_no')->nullable()->comment('n.e.c_no');
            $table->string('land_detail')->nullable()->comment('जग्गा विबरण');
            $table->string('room')->nullable()->comment('कोठा');
            $table->string('sent_to_organization')->default('Unseen');
            $table->timestamp('sent_to_admin_at')->nullable()->comment('admin लाई पठाएको मिति ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('building_documentations');
    }
};
