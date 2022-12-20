<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('photo')->nullable();
            $table->string('gender');
            $table->string('relationship_status');
            $table->string('spouse_name')->nullable();
            $table->string('father_name');
            $table->string('grandfather_name');
            $table->string('citizenship_no');
            $table->string('farmer_id_card_no')->nullable();
            $table->string('national_id_card_no')->nullable();
            $table->string('phone_no');
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('district_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('local_body_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('ward_no')->nullable();
            $table->string('village')->nullable();
            $table->string('tole')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

    }

    public function down()
    {
        Schema::dropIfExists('farmers');
    }
};
