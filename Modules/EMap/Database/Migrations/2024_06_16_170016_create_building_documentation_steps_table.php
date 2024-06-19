<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('building_documentation_steps', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('order')->nullable();
            $table->boolean('status')->default(true);
            $table->foreignId('map_pass_group_id')->nullable()->constrained('map_pass_groups')->nullOnDelete()->comment('फारम भर्ने समूह');
            $table->string('need_from');
            $table->boolean('show_to_consultancy')->default(true);
            $table->foreignId('map_group_id')->nullable()->constrained('map_pass_groups')->nullOnDelete()->comment('स्वीकृति दिने समूह');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('building_documentation_steps');
    }
};
