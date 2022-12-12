<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiscal_year_id')->constrained()->cascadeOnDelete();
            $table->string('registration_no')->comment('दर्ता नं');
            $table->string('registration_date')->nullable()->comment('दर्ता मिति वि.स.');
            $table->date('en_registration_date')->nullable()->comment('दर्ता मिति AD');
            $table->string('letter_number')->nullable()->comment('पत्र पछि');
            $table->string('letter_date')->nullable()->comment('पत्र मिति');
            $table->string('sender_name')->nullable()->comment('प्रेषकको नाम');
            $table->string('subject')->nullable()->comment('विषय');
            $table->string('receiver_name')->nullable()->comment('प्राप्तकर्ता नाम');
            $table->string('phone')->nullable()->comment('फोन');
            $table->string('signature_image')->nullable()->comment('हस्ताक्षर');
            $table->string('date')->nullable()->comment('मिति');
            $table->text('remarks')->nullable()->comment('टिप्पणीहरू');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrations');
    }
};
