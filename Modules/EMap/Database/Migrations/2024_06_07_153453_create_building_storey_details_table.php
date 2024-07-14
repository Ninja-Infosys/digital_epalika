<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('building_storey_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_documentation_id')->constrained()->cascadeOnDelete();
            $table->string('area_of_former_construction')->nullable()->comment('साविक निर्माण भइसकेको क्षेत्रफल');
            $table->string('land_area')->nullable()->comment('जग्गाको क्षेत्रफल');
            $table->string('remarks')->nullable()->comment('कैफियत');
            $table->foreignId('map_fee_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('building_storey_details');
    }
};
