<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sipharish_form_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sipharis_sub_category_id')->references('id')->on('sipharis_sub_category')->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->enum('need_approval',['yes','no']);
            $table->enum('status',['active','inactive'])->default('active');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sipharish_form_type');
    }
};
