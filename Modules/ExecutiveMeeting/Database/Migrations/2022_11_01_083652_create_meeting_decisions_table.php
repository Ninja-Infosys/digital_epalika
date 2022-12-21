<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('meeting_decisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meeting_event_id')->nullable()->constrained()->cascadeOnDelete();
            $table->enum('meeting_for', ['municipal', 'ward'])->default('municipal')->comment('बैठक को लागी');
            $table->string('subject')->nullable()->comment('विषय');
            $table->string('date')->nullable()->comment('मिति');
            $table->string('en_date')->nullable()->comment('अंग्रेजी मिति');
            $table->longText('description')->nullable()->comment('विवरण');
            $table->string('decision_file')->nullable()->comment('निर्णय फाइल');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meeting_decisions');
    }
};
