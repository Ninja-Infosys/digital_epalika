<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('order')->nullable();
            $table->string('form_type');
            $table->string('route_name')->nullable();
            $table->boolean('status')->default(true);
            $table->foreignId('map_pass_group_id')->nullable()->constrained('map_pass_groups')->nullOnDelete();
            $table->enum('need_from', ['owner', 'organization','office']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('forms');
    }
};
