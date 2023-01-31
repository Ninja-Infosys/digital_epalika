<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->comment('प्रयोगकर्ता')->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('reg_no')->nullable()->comment('दर्ता नम्बर');
            $table->string('name')->nullable()->comment('नाम');
            $table->string('phone_no')->nullable()->comment('सम्पर्क नं');
            $table->boolean('is_minor')->default(0);
            $table->string('gender')->default('male');
            $table->string('citizenship_no')->nullable()->comment('नागरिकता नं');
            $table->foreignId('permanent_province_id')->nullable()->constrained('provinces');
            $table->foreignId('permanent_district_id')->nullable()->constrained('districts');
            $table->foreignId('permanent_local_body_id')->nullable()->constrained('local_bodies');
            $table->integer('ward_no')->nullable()->comment('वार्ड नं');
            $table->string('tole')->nullable()->comment('टोल');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personal_details');
    }
};
