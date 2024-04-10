<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('sipharis_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('ward')->nullable();
            $table->foreignId('approver_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('checker_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sipharis_settings');
    }
};
