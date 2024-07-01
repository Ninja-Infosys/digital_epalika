<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('document_files', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('fileable');
            $table->foreignId('building_documentation_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('document');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('document_files');
    }
};
