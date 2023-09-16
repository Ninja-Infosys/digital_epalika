<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sipharis_signature_detail', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('position');
            $table->text('signature')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sipharis_signature_detail');
    }
};
