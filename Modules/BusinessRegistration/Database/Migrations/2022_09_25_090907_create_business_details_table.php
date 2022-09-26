<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('business_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proprietor_detail_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('business_detail_name')->nullable();
            $table->string('business_detail_en')->nullable();
            $table->foreignId('business_nature_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('establish_year')->nullable();
            $table->string('registration_date')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('transaction_object')->nullable();
            $table->string('amount_cost')->nullable();
            $table->boolean('source_of_capital')->default(0);
            $table->string('purpose')->nullable();
            $table->string('employment')->nullable();
            $table->string('house_owner_name')->nullable();
            $table->string('house_owner_phone')->nullable();
            $table->string('house_owner_address')->nullable();
            $table->string('house_owner_monthly_rent')->nullable();
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('district_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('local_body_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('ward_no')->nullable();
            $table->string('way')->nullable();
            $table->string('tole')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('business_details');
    }
};
