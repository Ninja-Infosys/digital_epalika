<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ward_meeting_notices', function (Blueprint $table) {
            $table->id();
            $table->string('broadcast_date');
            $table->string('broadcast_time');
            $table->string('type');
            $table->string('meeting_at');
            $table->string('meeting_subject')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ward_meeting_notices');
    }
};
