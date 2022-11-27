<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recommendation_templates', function (Blueprint $table) {
            $table->id();
            $table->string('for');
            $table->string('type')->nullable();
            $table->string('title');
            $table->longText('data');
            $table->boolean('requires_header')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recommendation_templates');
    }
};
