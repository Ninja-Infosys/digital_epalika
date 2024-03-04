<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recommendation_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recommendation_create_id')->constrained()->onDelete('cascade');
            $table->foreignId('recommendation_form_field_id')->constrained()->onDelete('cascade');
            $table->longText('value');
            $table->string('type')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recommendation_values');
    }
};
