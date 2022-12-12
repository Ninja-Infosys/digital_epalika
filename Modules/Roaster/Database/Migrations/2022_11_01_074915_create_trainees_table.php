<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('trainees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->comment('पुरा नाम');
            $table->foreignId('province_id')->comment('प्रदेश')->constrained()->onDelete('cascade')->onUpdate('no action');
            $table->foreignId('district_id')->comment('जिल्ला')->constrained()->onDelete('cascade')->onUpdate('no action');
            $table->foreignId('local_body_id')->comment('पालिका')->constrained()->onDelete('cascade')->onUpdate('no action');
            $table->integer('ward_no')->nullable()->comment('वार्ड नं.');
            $table->string('tole')->nullable()->comment('टोल');
            $table->string('citizenship_no')->comment('नागरिकता नं.');
            $table->string('gender')->comment('लिङ्ग');
            $table->foreignId('ethnicity_id')->nullable()->comment('जातियता')->constrained()->cascadeOnDelete();
            $table->string('category')->nullable()->comment('वर्ग');
            $table->string('phone_no')->nullable()->comment('फोन');
            $table->string('email_id')->nullable()->comment('ईमेल');
            $table->string('qualification')->nullable()->comment('योग्यता');
            $table->string('current_profession')->nullable()->comment('वर्तमान पेशा');
            $table->string('farming_area')->nullable()->comment('खेती क्षेत्र');
            $table->string('photo')->nullable();
            $table->string('application_form')->nullable();
            $table->string('ward_recommendation')->nullable();
            $table->string('mark_sheet')->nullable();
            $table->string('citizenship_front');
            $table->string('citizenship_back')->nullable();
            $table->string('passport')->nullable();
            $table->string('visa')->nullable();
            $table->string('other_training')->nullable();
            $table->boolean('select')->default(0)->comment('छनोट');
            $table->string('reference_id')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainees');
    }
};
