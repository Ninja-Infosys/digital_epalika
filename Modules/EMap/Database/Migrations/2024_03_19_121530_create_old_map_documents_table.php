<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('old_map_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('old_map_id')->constrained()->cascadeOnDelete();
            $table->string('document_name')->nullable();
            $table->string('document')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('old_map_documents');
    }
};
