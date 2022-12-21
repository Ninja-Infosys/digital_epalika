<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('form_builders', function (Blueprint $table) {
            $table->id();
            $table->string('application_type')->comment('आवेदन प्रकार');
            $table->json('form')->comment('फारम');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_builders');
    }
};
