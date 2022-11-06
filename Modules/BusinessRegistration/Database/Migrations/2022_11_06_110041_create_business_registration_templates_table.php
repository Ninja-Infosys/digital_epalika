<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('business_registration_templates', function (Blueprint $table) {
            $table->id();
            $table->string('for');
            $table->string('title');
            $table->longText('data');
            $table->boolean('requires_header')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('business_registration_templates');
    }
};
