<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pesticide_retailer_trainees', function (Blueprint $table) {
            $table->id();
            $table->string('reference_id')->unique();
            $table->string('full_name');
            $table->foreignId('province_id')->constrained()->onDelete('cascade')->onUpdate('no action');
            $table->foreignId('district_id')->constrained()->onDelete('cascade')->onUpdate('no action');
            $table->foreignId('local_body_id')->constrained()->onDelete('cascade')->onUpdate('no action');
            $table->integer('ward_no')->nullable();
            $table->string('tole')->nullable();
            $table->string('citizenship_no');
            $table->string('gender');
            $table->string('phone_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('qualification')->nullable();
            $table->string('current_profession')->nullable();
            $table->string('photo')->nullable();
            $table->string('mark_sheet')->nullable();
            $table->string('citizenship_front');
            $table->string('citizenship_back')->nullable();
            $table->string('other_training')->nullable();
            $table->boolean('select')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesticide_retailer_trainees');
    }
};
