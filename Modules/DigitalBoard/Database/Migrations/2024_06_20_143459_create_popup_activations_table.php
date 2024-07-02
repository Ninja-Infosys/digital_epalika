<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('popup_activations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pop_up_notice_id')->constrained('pop_up_notices')->cascadeOnDelete();
            $table->integer('ward')->nullable();
            $table->boolean('is_active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('popup_activations');
    }
};
