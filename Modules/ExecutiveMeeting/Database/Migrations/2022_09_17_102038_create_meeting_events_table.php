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
            $table->string('event_name')->comment('कार्यक्रम नाम');
            $table->string('recurrence')->comment('पुनरावर्ती');
            $table->string('start_date')->comment('सुरू मिति');
            $table->date('en_start_date')->comment('सुरू मिति अंग्रेजी');
            $table->string('end_date')->nullable()->comment('अन्त्य मिति');
            $table->date('en_end_date')->nullable()->comment('अन्त्य मिति अंग्रेजी');
            $table->enum('event_for', ['municipal', 'ward'])->default('municipal')->comment('कार्यक्रम लागि');
            $table->string('url')->nullable()->comment('url');
            $table->string('recurrence_end_date')->nullable()->comment('पुनरावृत्ति अन्त्य  मिति');
            $table->string('en_recurrence_end_date')->nullable()->comment('पुनरावृत्ति अन्त्य  अंग्रेजी मिति');
            $table->text('description')->nullable()->comment('विवरण');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meeting_events');
    }
};
