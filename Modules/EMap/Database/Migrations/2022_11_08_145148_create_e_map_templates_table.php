<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('e_map_templates', function (Blueprint $table) {
            $table->id();
            $table->string('for')->comment('लागि ');
            $table->string('type')->nullable()->comment('प्रकार ');
            $table->string('title')->comment('शिर्षक ');
            $table->longText('data')->comment('डाटा');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('e_map_templates');
    }
};
