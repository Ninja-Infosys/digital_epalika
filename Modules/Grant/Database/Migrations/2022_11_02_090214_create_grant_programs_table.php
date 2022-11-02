<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('grant_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiscal_year_id')->constrained()->cascadeOnDelete();
            $table->string('program_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grant_programs');
    }
};
