<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('three_generation_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proprietor_detail_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('relation')->nullable();
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->string('citizenship_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('three_generation_details');
    }
};
