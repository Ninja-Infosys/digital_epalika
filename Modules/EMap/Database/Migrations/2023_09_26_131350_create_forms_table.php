<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('order')->nullable();
            $table->string('form_type');
            $table->string('form_url_add')->nullable();
            $table->string('form_url_edit')->nullable();
            $table->string('form_url_view')->nullable();
            $table->boolean('status')->default(true);
            $table->foreignId('group_id')->nullable()->constrained()->nullOnDelete();
            $table->string('need_from');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('forms');
    }
};
