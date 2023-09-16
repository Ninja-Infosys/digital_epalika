<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sipharish_created', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sipharis_form_type_id')->references('id')->on('sipharish_form_type')->onDelete('cascade');
            $table->foreignId('signatured_by')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('approved_by')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->date('approved_date')->nullable();
            $table->enum('approved_status',['approved','rejected','pending'])->default('pending');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sipharish_created');
    }
};
