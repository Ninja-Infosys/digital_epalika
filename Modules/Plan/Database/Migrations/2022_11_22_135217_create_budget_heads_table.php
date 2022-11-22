<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('budget_heads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_head_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('budget_heads');
    }
};
