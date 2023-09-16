<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sipharish_created_value', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sipharish_created_id')->references('id')->on('sipharish_created')->onDelete('cascade');
            $table->foreignId('sipharish_form_fields_id')->references('id')->on('sipharis_form_fields')->onDelete('cascade');
            $table->string('value');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sipharish_created_value');
    }
};
