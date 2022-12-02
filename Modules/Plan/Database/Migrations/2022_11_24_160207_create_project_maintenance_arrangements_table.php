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
            $table->double('public_service',12,2)->default(0);
            $table->double('service_fee',12,2)->default(0);
            $table->double('from_fee_donation',12,2)->default(0);
            $table->double('others',12,2)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_maintenance_arrangements');
    }
};
