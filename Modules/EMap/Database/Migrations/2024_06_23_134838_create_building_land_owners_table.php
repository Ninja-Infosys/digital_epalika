<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('building_land_owners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_documentation_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('name')->nullable()->comment('नाम');
            $table->string('phone')->nullable()->comment('फोन नं.');
            $table->string('father_name')->nullable()->comment('बुवाको नाम');
            $table->string('grandfather_name')->nullable()->comment('हजुरबुबाको नाम');
            $table->string('citizenship_issue_district_id')->nullable()->comment('नागरिकता लिएको जिल्ला');
            $table->string('citizenship_no')->nullable()->comment('नागरिकत नम्बर');
            $table->string('citizenship_issue_date')->nullable()->comment('नागरिकता लिएको मिति');
            $table->string('former_ward_no')->nullable()->comment('ठेगाना');
            $table->string('former_local_body')->nullable()->comment('पालिका');
            $table->integer('ward_no')->nullable()->comment('वडा नं');
            $table->foreignId('province_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('district_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('local_body_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('tole')->nullable();
            $table->string('document')->nullable();
            $table->string('photo')->nullable();
            $table->string('signature')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('building_land_owners');
    }
};
