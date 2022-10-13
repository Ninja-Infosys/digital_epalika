<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('map_applies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('unique_id')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('registration_date')->nullable();
            $table->string('construction_type');
            $table->string('usage');
            $table->string('building_category');
            $table->foreignId('structure_type_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('fiscal_year_id')->nullable()->constrained()->cascadeOnDelete();
            $table->double('current_storey', 8, 2);
            $table->double('future_storey', 8, 2);
            $table->double('area_of_plinth', 12, 2);
            $table->double('length', 12, 2);
            $table->double('breadth', 12, 2);
            $table->double('height', 12, 2);
            $table->foreignId('organization_id')->nullable()->constrained()->nullOnDelete();
            $table->string('consultant_signature')->nullable();
            $table->string('consultant_name')->nullable();
            $table->string('consultant_mobile_no')->nullable();
            $table->string('consultant_nec_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('map_applies');
    }
};
