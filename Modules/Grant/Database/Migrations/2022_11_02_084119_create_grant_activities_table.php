<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('grant_activities', function (Blueprint $table) {
            $table->id();
            $table->string('grant_recipient_type')->comment('अनुदान प्राप्तकर्ता प्रकार');
            $table->string('title')->comment('शीर्षक');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grant_activities');
    }
};
