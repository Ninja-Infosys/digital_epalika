<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('building_template_stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_documentation_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('building_documentation_step_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('building_form_data_type_id')->nullable()->constrained()->cascadeOnDelete();
            $table->longText('data')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('building_template_stores');
    }
};
