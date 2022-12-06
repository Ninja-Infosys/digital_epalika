<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('three_generation_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proprietor_detail_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('relation')->nullable()->comment('नाता');
            $table->string('name')->nullable()->comment('नाम, थर');
            $table->string('name_en')->nullable()->comment('नाम, थर( अंग्रेजीमा)');
            $table->string('citizenship_no')->nullable()->comment('नागरिकता नं');
            $table->string('mobile_no')->nullable()->comment('सम्पर्क नं');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('three_generation_details');
    }
};
