<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('partner_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_detail_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('relation')->nullable()->comment('नाता');
            $table->string('name')->nullable()->comment('नाम');
            $table->string('citizenship_no')->nullable()->comment('नागरिकता नम्बर');
            $table->string('mobile_no')->nullable()->comment('फोन नम्बर');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partner_details');
    }
};
