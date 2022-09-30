<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('land_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('map_apply_id')->constrained()->cascadeOnDelete();
            $table->double('land_use_area', 12, 2)->default(0);
            $table->integer('ward_no')->nullable();
            $table->integer('former_ward_no')->nullable();
            $table->string('tole')->nullable();
            $table->string('street_code_no')->nullable();
            $table->string('plot_no')->nullable();
            $table->double('percentage_of_area_covered_by_building', 10, 2)->default(0);
            $table->foreignId('unit_id')->nullable()->constrained()->nullOnDelete();
            $table->string('unit_value')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('land_details');
    }
};
