<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('file_template_stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('map_apply_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('form_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('form_data_type_id')->nullable()->constrained()->cascadeOnDelete();
            $table->longText('data')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_template_stores');
    }
};
