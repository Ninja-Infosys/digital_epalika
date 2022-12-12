<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('chief_judicial_members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('नाम');
            $table->string('photo')->nullable()->comment('फोटो');
            $table->integer('position')->comment('स्थान');
            $table->foreignId('designation_id')->nullable()->constrained()->nullOnDelete();
            $table->string('phone')->nullable()->comment('फोन');
            $table->boolean('status')->default(1)->comment('स्थिति ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chief_judicial_members');
    }
};
