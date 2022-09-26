<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('business_registration_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proprietor_detail_id')->constrained()->cascadeOnDelete();
            $table->string('photo')->nullable();
            $table->string('citizen_ship')->nullable();
            $table->string('company_registration')->nullable();
            $table->string('tax_pay_file')->nullable();
            $table->string('property')->nullable();
            $table->string('signature')->nullable();
            $table->string('thumb')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('business_registration_files');
    }
};
