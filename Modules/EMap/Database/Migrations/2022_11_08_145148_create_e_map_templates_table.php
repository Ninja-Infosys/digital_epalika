<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('e_map_templates', function (Blueprint $table) {
            $table->id();
            $table->string('for');
            $table->string('type')->nullable();
            $table->string('title');
            $table->longText('data');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('e_map_templates');
    }
};
