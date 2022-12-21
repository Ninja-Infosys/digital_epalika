<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('task_divisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_category_id')->comment('कार्य वर्ग आईडी')->constrained()->cascadeOnDelete();
            $table->string('title')->comment('शीर्षक');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('task_divisions');
    }
};
