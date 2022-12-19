<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    public function up()
    {
        Schema::create('recommendation_templates', function (Blueprint $table) {
            $table->id();
            $table->string('application_type')->comment('आवेदन प्रकार');
            $table->string('title')->comment('शीर्षक');
            $table->longText('data')->comment('डाटा');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recommendation_templates');
    }
};
