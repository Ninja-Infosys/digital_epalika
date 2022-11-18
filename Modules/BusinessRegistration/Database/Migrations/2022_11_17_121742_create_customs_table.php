<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proprietor_detail_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('application_fee')->nullable();
            $table->string('registration_fee')->nullable();
            $table->string('business_tax')->nullable();
            $table->string('introduction_board_fees')->nullable();
            $table->string('fine')->nullable();
            $table->string('date')->nullable();
            $table->string('registration_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customs');
    }
};
