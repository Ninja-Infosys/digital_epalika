<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('grant_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiscal_year_id')->constrained()->cascadeOnDelete();
            $table->foreignId('grant_program_id')->constrained()->cascadeOnDelete();
            $table->string('grant_recipient_name');
            $table->string('grant_recipient_code_no')->nullable();
            $table->foreignId('province_id')->constrained()->cascadeOnDelete();
            $table->foreignId('district_id')->constrained()->cascadeOnDelete();
            $table->foreignId('local_body_id')->constrained()->cascadeOnDelete();
            $table->integer('ward_no')->nullable();
            $table->string('tole')->nullable();
            $table->string('grant_recipient_type')->nullable();
            $table->foreignId('grant_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('grant_activity_id')->constrained()->cascadeOnDelete();
            $table->double('total_cost', 12, 2)->default(0);
            $table->double('grant_amount', 12, 2)->default(0);
            $table->double('investment_amount', 12, 2)->default(0);
            $table->string('beneficial_area')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('is_continuity')->default(0);
            $table->foreignId('prev_fiscal_year_id')->nullable()->constrained('fiscal_years');
            $table->double('prev_cost_amount', 12, 2)->nullable();
            $table->text('beneficial_places')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grant_details');
    }
};
