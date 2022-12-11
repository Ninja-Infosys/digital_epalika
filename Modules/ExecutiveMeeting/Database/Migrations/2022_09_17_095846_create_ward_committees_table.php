<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('ward_committees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('नाम');
            $table->string('designation')->nullable()->comment('पदनाम');
            $table->string('phone')->nullable()->comment('फोन');
            $table->string('photo')->nullable()->comment('फोटो');
            $table->string('email')->nullable()->comment('इमेल');
            $table->foreignId('province_id')->nullable()->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('local_body_id')->nullable()->constrained();
            $table->integer('ward_no')->nullable()->comment('वार्ड नं');
            $table->string('village')->nullable()->comment('गाउँ');
            $table->string('tole')->nullable()->comment('टोल');
            $table->integer('position')->comment('स्थान');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ward_committees');
    }
};
