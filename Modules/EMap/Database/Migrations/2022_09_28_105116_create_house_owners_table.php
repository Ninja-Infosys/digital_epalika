<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('house_owners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('map_apply_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('father_name')->nullable();
            $table->string('citizenship_issue_district_id')->nullable();
            $table->string('citizenship_no')->nullable();
            $table->string('citizenship_issue_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('house_owners');
    }
};
