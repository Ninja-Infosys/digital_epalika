<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registered_businesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_detail_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('registration_no')->nullable();
            $table->string('business_name')->nullable();
            $table->string('registration_date')->nullable();
            $table->string('active')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registered_businesses');
    }
};
