<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('introboards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proprietor_detail_id')->constrained()->cascadeOnDelete();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('square')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('introboards');
    }
};
