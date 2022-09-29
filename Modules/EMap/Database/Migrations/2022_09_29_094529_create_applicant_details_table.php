<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('applicant_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('map_apply_id')->constrained()->cascadeOnDelete();
            $table->string('applicant_type')->nullable();
            $table->string('relation_with_owner')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('father_name')->nullable();
            $table->foreignId('citizenship_issue_district_id')->nullable()->constrained('districts');
            $table->string('citizenship_no')->nullable();
            $table->string('citizenship_issue_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applicant_details');
    }
};
