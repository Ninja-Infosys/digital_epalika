<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('grievance_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grievance_detail_id')->nullable()->constrained();
            $table->string('token')->unique()->nullable();
            $table->foreignId('grievance_user_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('grievance_type_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('grievance_office_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('subject')->nullable();
            $table->longText('description')->nullable();
            $table->string('complaint_severity')->nullable();
            $table->boolean('is_open')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grievance_details');
    }
};
