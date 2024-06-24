<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contractor_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_documentation_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('contractor_name')->nullable()->comment('ठेकेदारको नाम');
            $table->string('contractor_signature')->nullable()->comment('ठेकेदारको नाम');
            $table->foreignId('province_id')->nullable()->comment('ठेकेदारको प्रदेश')->constrained();
            $table->foreignId('district_id')->nullable()->comment('ठेकेदारको जिल्ला')->constrained();
            $table->foreignId('local_body_id')->nullable()->comment('ठेकेदारको पालिका')->constrained();
            $table->string('ward_no')->nullable()->comment('ठेकेदारको वडा नं');
            $table->string('tole')->nullable()->comment('ठेकेदारको गाउ/टोल');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contractor_details');
    }
};
