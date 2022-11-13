<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('designer_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('map_apply_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('grandfather_name')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('local_body')->nullable();
            $table->integer('ward_no')->nullable();
            $table->string('post')->nullable();
            $table->string('nec_council_no')->nullable();
            $table->string('local_body_registration_no')->nullable();
            $table->string('consulting_firm_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('designer_details');
    }
};
