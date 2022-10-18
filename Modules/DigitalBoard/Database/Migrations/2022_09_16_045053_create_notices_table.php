<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('date');
            $table->date('en_date')->nullable();
            $table->longText('description')->nullable();
            $table->dateTime('closed_at')->nullable();
            $table->boolean('show_on_index')->default(1);
            $table->foreignId('user_id')->constrained();
            $table->string('type')->default('Notice');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notices');
    }
};
