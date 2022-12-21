<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recommendation_form_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recommendation_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->longText('data');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recommendation_form_data');
    }
};
