<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('map_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('map_apply_id')->constrained()->cascadeOnDelete();
            $table->string('form_receipt')->nullable();
            $table->string('application_registration_fee')->nullable();
            $table->string('other')->nullable();
            $table->string('nepali_date')->nullable();
            $table->string('english_date')->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('recipient')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('map_registrations');
    }
};
