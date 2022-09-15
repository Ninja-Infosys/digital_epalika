<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('dispatches', function (Blueprint $table) {
            $table->id();
            $table->string('dispatch_no');
            $table->string('dispatch_date')->nullable();
            $table->string('letter_number')->nullable();
            $table->string('letter_date')->nullable();
            $table->string('subject')->nullable();
            $table->string('receiver_name')->nullable();
            $table->string('receiver_address')->nullable();
            $table->string('receiver_contact')->nullable();
            $table->string('receiver_signature')->nullable();
            $table->string('date')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dispatches');
    }
};
