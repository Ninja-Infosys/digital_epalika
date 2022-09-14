<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no');
            $table->string('registration_date')->nullable();
            $table->string('letter_number')->nullable();
            $table->string('letter_date')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('subject')->nullable();
            $table->string('receiver_name')->nullable();
            $table->foreignId('province_id')->nullable()->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('local_body_id')->nullable()->constrained();
            $table->integer('ward_no')->nullable();
            $table->string('phone')->nullable();
            $table->string('signature_image')->nullable();
            $table->string('date')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrations');
    }
};
