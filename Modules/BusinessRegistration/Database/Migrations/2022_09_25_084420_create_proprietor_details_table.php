<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proprietor_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('citizenship_no');
            $table->string('issue_date');
            $table->foreignId('issue_district_id')->nullable()->constrained('districts')->nullOnDelete()->onUpdate('no action');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('district_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('local_body_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('ward_no')->nullable();
            $table->string('way')->nullable();
            $table->string('tole')->nullable();
            $table->string('house_no')->nullable();
            $table->string('account_no')->nullable();
            $table->string('national_card_no')->nullable();
            $table->string('gender')->nullable();
            $table->string('education_qualification')->nullable();
            $table->string('occupation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proprietor_details');
    }
};
