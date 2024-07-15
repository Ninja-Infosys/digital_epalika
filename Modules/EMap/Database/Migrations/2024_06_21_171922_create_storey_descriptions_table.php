<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('storey_descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_documentation_id')->constrained()->cascadeOnDelete();
            $table->string('height')->nullable()->comment('उचाई');
            $table->string('width')->nullable()->comment('चऔडाई');
            $table->string('length')->nullable()->comment('लम्बाई');
            $table->foreignId('map_fee_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('storey_descriptions');
    }
};
