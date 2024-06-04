<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('neighbours', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('neighbourable');
            $table->string('neighbour_name')->comment('संधियारको नाम');
            $table->string('direction')->comment('दिशा');
            $table->string('ward_no')->comment('वडा नं');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('neighbours');
    }
};
