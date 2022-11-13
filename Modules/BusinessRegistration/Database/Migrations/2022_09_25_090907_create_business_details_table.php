<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('business_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proprietor_detail_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('business_detail_name')->nullable();
            $table->string('submission_no')->nullable();
            $table->string('business_detail_name_en')->nullable();
            $table->string('establish_year')->nullable();
            $table->string('business_nature')->nullable();
            $table->string('registration_date')->nullable();
            $table->string('pan_no')->nullable();
            $table->boolean('is_registered')->default(0);
            $table->boolean('is_rent')->default(0);
            $table->string('amount_cost')->nullable();
            $table->string('source_of_capital')->nullable();
            $table->string('purpose')->nullable();
            $table->string('employment')->nullable();
            $table->string('house_owner_name')->nullable();
            $table->string('house_owner_phone')->nullable();
            $table->string('house_owner_address')->nullable();
            $table->string('house_owner_monthly_rent')->nullable();
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('district_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('local_body_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('investment_revenue_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
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
