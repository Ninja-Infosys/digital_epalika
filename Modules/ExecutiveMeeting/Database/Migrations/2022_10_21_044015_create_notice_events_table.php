<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('notice_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->string('className');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notice_events');
    }
};
