<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('consumer_committee_officials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('post')->nullable();
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('grandfather_name')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('citizenship_no')->nullable();
            $table->boolean('is_disabled')->default(0);
            $table->boolean('is_dalit_janajati_aadibasi')->default(0);
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consumer_committee_officials');
    }
};
