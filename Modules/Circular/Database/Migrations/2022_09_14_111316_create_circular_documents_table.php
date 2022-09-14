<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('circular_documents', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('model');
            $table->string('file_name')->nullable();
            $table->string('extension')->nullable();
            $table->string('file');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('circular_documents');
    }
};
