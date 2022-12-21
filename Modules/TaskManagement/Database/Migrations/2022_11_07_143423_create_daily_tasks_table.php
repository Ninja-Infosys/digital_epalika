<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('daily_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiscal_year_id')->comment('आर्थिक वर्ष आईडी')->constrained()->cascadeOnDelete();
            $table->foreignId('branch_id')->nullable()->comment('शाखा आईडी')->constrained()->cascadeOnDelete();
            $table->foreignId('task_category_id')->nullable()->comment('कार्य वर्ग कार्य कोटी आईडी')->constrained()->cascadeOnDelete();
            $table->foreignId('task_division_id')->nullable()->comment('कार्य विभाजन आईडी')->constrained()->cascadeOnDelete();
            $table->string('date')->comment('मिति वि.क.');
            $table->date('en_date')->nullable()->comment('मिति AD');
            $table->text('remarks')->nullable()->comment('कैफियत');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daily_tasks');
    }
};
