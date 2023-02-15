<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registration_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->comment('प्रयोगकर्ता')->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('registration_no')->comment('दर्ता नं');
            $table->string('application')->nullable()->comment('निवेदन');
            $table->string('recommendation')->nullable()->comment('सिफारिस');
            $table->longText('recommendation_data')->nullable()->comment('सिफारिस डाटा');
            $table->foreignId('recommendation_category_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action')->comment('सिफारिस प्रकार');
            $table->foreignId('personal_detail_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action')->comment('व्यक्तिगत विवरण');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registration_details');
    }
};
