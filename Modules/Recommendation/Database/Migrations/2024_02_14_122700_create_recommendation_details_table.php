<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recommendation_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recommendation_category_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('title');
            $table->string('title_en');
            $table->string('type'); //enums
            $table->string('service_cost');
            $table->integer('general_time');
            $table->integer('surrogate_time');
            $table->boolean('is_citizenship_required')->default(0);
            $table->boolean('is_applicable_org')->default(0);
            $table->boolean('is_applicant_self')->default(0);
            $table->boolean('is_permission_required')->default(0);
            $table->boolean('is_taxcode_required')->default(0);
            $table->boolean('add_land_diff_locations')->default(0);
            $table->boolean('is_applicable_on_recommendation')->default(0);
            $table->integer('order')->nullable();
            $table->boolean('status')->default(1);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recommendation_details');
    }
};
