<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('consumer_committees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('formation_date')->nullable();
            $table->string('committee_registration_date')->nullable();
            $table->string('meeting_date')->nullable();
            $table->string('registration_no')->nullable();
            $table->integer('beneficiary_no')->nullable();
            $table->string('experience_in_project')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consumer_committees');
    }
};
