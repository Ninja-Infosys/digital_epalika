<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('committee_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('meeting_id')->nullable()->constrained()->nullOnDelete();
            $table->string('meeting_name');
            $table->string('recurrence')->nullable();
            $table->string('start_date');
            $table->date('en_start_date');
            $table->string('end_date')->nullable();
            $table->date('en_end_date')->nullable();
            $table->string('recurrence_end_date')->nullable();
            $table->date('en_recurrence_end_date')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meetings');
    }
};
