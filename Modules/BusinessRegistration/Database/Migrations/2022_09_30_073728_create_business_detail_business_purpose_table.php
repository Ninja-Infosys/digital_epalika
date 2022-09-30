<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('business_detail_business_purpose', function (Blueprint $table) {
           $table->foreignId('business_detail_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
           $table->foreignId('business_purpose_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('business_detail_business_purpose');
    }
};
