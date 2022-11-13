<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('meeting_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meeting_event_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('event_name');
            $table->string('recurrence');
            $table->string('start_date');
            $table->date('en_start_date');
            $table->string('end_date')->nullable();
            $table->date('en_end_date')->nullable();
            $table->enum('event_for', ['municipal', 'ward'])->default('municipal');
            $table->string('url')->nullable();
            $table->string('recurrence_end_date')->nullable();
            $table->string('en_recurrence_end_date')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meeting_events');
    }
};
