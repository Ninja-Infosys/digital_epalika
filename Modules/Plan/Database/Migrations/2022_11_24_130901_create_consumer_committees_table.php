<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('consumer_committees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->comment('परियोजना आईडी')->constrained()->cascadeOnDelete();
            $table->string('name')->nullable()->comment('नाम');
            $table->string('address')->nullable()->comment('ठेगाना');
            $table->string('phone')->nullable()->comment('फोन');
            $table->string('formation_date')->nullable()->comment('गठन मिति');
            $table->string('committee_registration_date')->nullable()->comment('समिति दर्ता मिति');
            $table->string('meeting_date')->nullable()->comment('बैठक मिति');
            $table->string('registration_no')->nullable()->comment('दर्ता नं');
            $table->integer('beneficiary_no')->nullable()->comment('लाभार्थी नं');
            $table->integer('member_number')->default(0)->comment('सदस्य संख्या');
            $table->string('experience_in_project')->nullable()->comment('परियोजना मा अनुभव');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consumer_committees');
    }
};
