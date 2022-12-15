<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('dispatches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiscal_year_id')->constrained()->cascadeOnDelete();
            $table->string('dispatch_no')->comment('चलानी नं.');
            $table->string('dispatch_date')->nullable()->comment('चलानी मिति');
            $table->date('en_dispatch_date')->nullable()->comment('चलानी मिति अंग्रेजी');
            $table->string('letter_number')->nullable()->comment('पत्र संख्या');
            $table->string('letter_date')->nullable()->comment('पत्र मिति');
            $table->date('en_letter_date')->nullable()->comment('पत्र मिति अंग्रेजी');
            $table->string('subject')->nullable()->comment('विषय');
            $table->string('receiver_name')->nullable()->comment('प्राप्तकर्ता नाम');
            $table->string('receiver_address')->nullable()->comment('प्राप्तकर्ता ठेगाना');
            $table->string('receiver_contact')->nullable()->comment('प्राप्तकर्ता सम्पर्क');
            $table->string('receiver_signature')->nullable()->comment('प्राप्तकर्ता हस्ताक्षर');
            $table->text('remarks')->nullable()->comment('टिप्पणीहरू');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dispatches');
    }
};
