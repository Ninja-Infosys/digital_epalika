<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sipharis_form_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sipharish_form_type_id')->references('id')->on('sipharish_form_type')->onDelete('cascade');
            $table->string('field_name');
            $table->enum('status',['active','inactive'])->default('active');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sipharis_form_fields');
    }
};
