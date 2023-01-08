<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('submissions_id')->unique();
            $table->string('registration_no')->nullable()->unique();
            $table->string('registration_date')->nullable();
            $table->string('registration_date_en')->nullable();
            $table->foreignId('fiscal_year_id')->nullable()->constrained()->nullOnDelete();
            $table->string('tax_payer_number')->nullable();
//            business
            $table->string('name');
            $table->string('business_start_date');
            $table->foreignId('business_nature_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('object_transaction_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('province_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->foreignId('local_body_id')->constrained();
            $table->string('address');
            $table->string('ward_no');
            $table->string('tole');
            $table->string('street_name')->nullable();
            $table->string('house_number')->nullable();
            $table->string('capital_investment');
            $table->string('working_capital');
            $table->string('fixed_capital');
            $table->string('board_size');
//            owner
            $table->string('owner_name');
            $table->string('citizenship_number');
            $table->string('citizenship_issue_date');
            $table->string('citizenship_issue_district_id');
            $table->string('business_rent_owner');
            $table->string('owner_photo');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('businesses');
    }
};
