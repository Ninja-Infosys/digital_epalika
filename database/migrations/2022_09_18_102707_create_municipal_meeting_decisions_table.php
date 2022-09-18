<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('municipal_meeting_decisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('municipal_meeting_notice_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('subject')->nullable();
            $table->string('date')->nullable();
            $table->longText('description')->nullable();
            $table->string('decision_file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('municipal_meeting_decisions');
    }
};
