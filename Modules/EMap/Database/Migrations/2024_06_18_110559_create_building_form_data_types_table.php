<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('building_form_data_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_documentation_step_id')->constrained()->cascadeOnDelete();
            $table->nullableMorphs('model');
            $table->string('type');
            $table->string('route_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('building_form_data_types');
    }
};
