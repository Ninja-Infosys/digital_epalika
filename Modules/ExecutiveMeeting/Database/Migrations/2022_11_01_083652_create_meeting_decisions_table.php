<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('meeting_decisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meeting_event_id')->nullable()->constrained()->cascadeOnDelete();
            $table->enum('meeting_for', ['municipal', 'ward'])->default('municipal');
            $table->string('subject')->nullable();
            $table->string('date')->nullable();
            $table->string('en_date')->nullable();
            $table->longText('description')->nullable();
            $table->string('decision_file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meeting_decisions');
    }
};
