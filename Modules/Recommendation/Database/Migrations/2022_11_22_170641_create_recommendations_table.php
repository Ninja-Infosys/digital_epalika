<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiscal_year_id')->nullable()->comment('आर्थिक वर्ष आईडी')->constrained()->cascadeOnDelete();
            $table->string('date_ne')->comment('मिति वि.क.');
            $table->string('date_en')->comment('मिति AD');
            $table->string('name')->nullable()->comment('नाम');
            $table->string('application_type')->comment('आवेदन प्रकार');
            $table->json('data')->comment('डाटा');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recommendations');
    }
};
