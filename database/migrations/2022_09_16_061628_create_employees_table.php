<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('नाम');
            $table->string('department')->nullable()->comment('विभाग');
            $table->string('designation')->nullable()->comment('पदनाम');
            $table->string('photo')->nullable()->comment('फोटो');
            $table->string('email')->nullable()->comment('इमेल');
            $table->string('phone')->nullable()->comment('फोटो');
            $table->integer('position')->nullable()->comment('स्थान');
            $table->boolean('status')->default(true)->comment('स्थिति');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
