<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('required_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_documentation_id')->constrained()->cascadeOnDelete();
            $table->string('citizenship')->nullable()->comment('नेपाली नागरिकताको प्रमाण पत्रको प्रतिलिपी');
            $table->string('landowner_proved')->nullable()->comment('जग्गाधनि प्रमाण पत्रको प्रतिलिपी');
            $table->string('revenue')->nullable()->comment('चालु आ.व को घर जग्गा कर तिरेको रसिदको प्रतिलिपि');
            $table->string('building_map')->nullable()->comment('घरको नक्सा');
            $table->string('land_map')->nullable()->comment('जग्गाको नक्सा');
            $table->string('all_round_house_pic')->nullable()->comment('चारैतिरको फोटो');
            $table->string('photo')->nullable()->comment('घरधनिको फोटो');
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('required_documents');
    }
};
