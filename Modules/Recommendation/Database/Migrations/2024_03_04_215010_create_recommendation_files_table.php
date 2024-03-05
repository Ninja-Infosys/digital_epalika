<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    public function up()
    {
        Schema::create('recommendation_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recommendation_create_id')->constrained()->cascadeOnDelete();
            $table->foreignId('recommendation_document_id')->nullable()->constrained()->nullOnDelete();
            $table->string('file');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recommendation_files');
    }
};
