<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('map_registration_particulars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('map_registration_id')->constrained()->cascadeOnDelete();
            $table->string('storey')->nullable();
            $table->double('area', 12, 2)->default(0);
            $table->string('rate')->default(0);
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('map_registration_particulars');
    }
};
