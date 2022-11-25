<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('project_maintenance_arrangements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('office_name')->nullable();
            $table->string('public_service')->nullable();
            $table->string('service_fee')->nullable();
            $table->string('from_fee_donation')->nullable();
            $table->string('others')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_maintenance_arrangements');
    }
};
