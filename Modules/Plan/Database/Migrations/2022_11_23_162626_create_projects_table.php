<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->foreignId('plan_area_id')->nullable()->constrained()->nullOnDelete();
            $table->string('project_status');
            $table->string('project_start_date')->nullable();
            $table->string('project_completion_date')->nullable();
            $table->foreignId('plan_level_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('ward_no')->nullable();
            $table->foreignId('budget_source_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('budget_head_id')->nullable()->constrained()->nullOnDelete();
            $table->double('allocated_amount',12,2)->default(0);
            $table->string('project_venue')->nullable();
            $table->double('evaluation_amount',12,2)->default(0);
            $table->string('purpose')->nullable();
            $table->boolean('is_deadline_extended')->default(0);
            $table->string('extended_date')->nullable();
            $table->double('progress_spent_amount',12,2)->default(0);
            $table->double('physical_progress_target',12,2)->default(0);
            $table->double('physical_progress_completed',12,2)->default(0);
            $table->string('physical_progress_unit')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
