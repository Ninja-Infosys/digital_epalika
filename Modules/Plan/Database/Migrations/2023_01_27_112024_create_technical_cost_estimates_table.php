<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('technical_cost_estimates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('detail')->comment('विवरण');
            $table->double('number',12,2)->default(0)->comment('संख्या');
            $table->double('length',12,2)->default(0)->comment('लम्बाइ');
            $table->double('breadth',12,2)->default(0)->comment('चौडाई');
            $table->double('height',12,2)->default(0)->comment('उचाइ');
            $table->double('quantity',12,2)->default(0)->comment('परिमाण');
            $table->string('unit')->comment('इकाइ');
            $table->double('rate',12,2)->default(0)->comment('दर');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('technical_cost_estimates');
    }
};
