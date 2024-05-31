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
            $table->string('house_owner_name')->nullable()->comment('घरधनिको नाम');
            $table->string('applicant_name')->nullable()->comment('निवेदकको नाम');
            $table->string('application_date')->nullable()->comment('निवेदन दिएको मिति');
            $table->foreignId('province_id')->nullable()->comment('प्रदेश')->constrained();
            $table->foreignId('district_id')->nullable()->comment('जिल्ला')->constrained();
            $table->foreignId('local_body_id')->nullable()->comment('पालिका')->constrained();
            $table->string('ward_no')->nullable()->comment('वडा नं');
            $table->string('tole')->nullable()->comment('गाउ/टोल');
            $table->foreignId('former_province_id')->nullable()->constrained('provinces')->comment('प्रदेश')->constrained();
            $table->foreignId('former_district_id')->nullable()->constrained('districts')->comment('जिल्ला')->constrained();
            $table->foreignId('former_local_body_id')->nullable()->constrained('local_bodies')->comment('पालिका')->constrained();
            $table->string('former_ward_no')->nullable()->comment('वडा नं');
            $table->string('former_tole')->nullable()->comment('गाउ/टोल');
            $table->string('phone')->nullable()->comment('निवेदकको सम्पर्क नं');
            $table->string('plot_no')->nullable()->comment('कित्ता नं');
            $table->string('land_area')->nullable()->comment('जग्गाको क्षेत्रफल');
            $table->string('house_start_date')->nullable()->comment('घर निर्माण गर्न सुरु गरेको मिति');
            $table->string('house_end_date')->nullable()->comment('घर  निर्माण सम्पन्न मिति');
            $table->string('room')->nullable()->comment('कोठा');
            $table->string('storey')->nullable()->comment('तल्ला');
            $table->string('area')->nullable()->comment('घरको क्षेत्रफल');
            $table->string('building_category')->nullable()->comment('घरको वर्गीकरण');
            $table->string('length')->nullable()->comment('भवनको लम्बाई');
            $table->string('breadth')->nullable()->comment('भवनको चौडाइ');
            $table->string('height')->nullable()->comment('भवनको उचाइ');
            $table->string('road_jurisdiction')->nullable()->comment('सडक अधिकार क्षेत्र');
            $table->string('land_detail')->nullable()->comment('जग्गा विबरण');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('building_documentations');
    }
};
