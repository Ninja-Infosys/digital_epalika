<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('office_headers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('font')->nullable();
            $table->string('font_size')->nullable();
            $table->string('position')->nullable();
            $table->string('font_color')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('office_headers');
    }
};
