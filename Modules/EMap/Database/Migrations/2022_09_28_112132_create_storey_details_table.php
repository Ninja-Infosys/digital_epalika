<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('storey_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('map_apply_id')->constrained()->cascadeOnDelete();
            $table->foreignId('map_fee_id')->constrained()->cascadeOnDelete();
            $table->string('area_of_proposed_construction', 12, 2)->default(0)->comment('प्रस्तावित निर्माण क्षेत्र');
            $table->string('area_of_former_construction', 12, 2)->default(0)->comment('पूर्व निर्माण क्षेत्र');
            $table->string('total_area', 12, 2)->default(0)->comment('कुल क्षेत्रफल');
            $table->string('height', 12, 2)->default(0)->comment('उचाइ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('storey_details');
    }
};
