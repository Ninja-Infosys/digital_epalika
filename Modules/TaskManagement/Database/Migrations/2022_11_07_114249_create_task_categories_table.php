<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('task_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->comment('शाखा आईडी')->constrained()->cascadeOnDelete();
            $table->string('title')->comment('शीर्षक');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('task_categories');
    }
};
