<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('training_trainees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_id')->constrained();
            $table->morphs('model');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('training_trainees');
    }
};
