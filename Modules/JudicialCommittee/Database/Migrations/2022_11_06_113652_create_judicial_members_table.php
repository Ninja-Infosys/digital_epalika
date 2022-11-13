<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('judicial_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->integer('position');
            $table->foreignId('designation_id')->nullable()->constrained()->nullOnDelete();
            $table->string('phone')->nullable();
            $table->foreignId('province_id')->nullable()->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('local_body_id')->nullable()->constrained();
            $table->integer('ward_no')->nullable();
            $table->string('tole')->nullable();
            $table->string('gender');
            $table->string('dob')->nullable();
            $table->string('en_dob')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('grandfather_name')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('judicial_members');
    }
};
