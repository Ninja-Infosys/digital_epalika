<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('building_descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_documentation_id')->constrained()->cascadeOnDelete();
            $table->string('direction')->comment('दिशा');
            $table->string('has_road')->comment('सडक छ, छैन');
            $table->string('has_window')->comment('झयाल ढोका छ, छैन');
            $table->string('minimum_distance_to_leave')->nullable()->comment('न्युनतम छाड्नु पर्ने');
            $table->string('leave')->nullable()->comment('छाडिएको');
            $table->string('remarks')->nullable()->comment('कैफियत');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('building_descriptions');
    }
};
