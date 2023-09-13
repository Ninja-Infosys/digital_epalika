<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sipharis_sub_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sipharis_category_id')->references('id')->on('sipharis_category')->onDelete('cascade');
            $table->string('title')->comment('शीर्षक');;
            $table->enum('status',['active','inactive'])->default('active');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sipharis_sub_category');
    }
};
