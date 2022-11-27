<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('benefited_member_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->integer('ward_no');
            $table->string('village');
            $table->integer('dalit_backward_no')->nullable();
            $table->integer('other_households_no')->nullable();
            $table->integer('no_of_male')->nullable();
            $table->integer('no_of_female')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('benefited_member_details');
    }
};
