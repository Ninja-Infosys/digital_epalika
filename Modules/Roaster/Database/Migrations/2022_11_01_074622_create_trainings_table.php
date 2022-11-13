<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->foreignId('fiscal_year_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->timestamp('open_date')->nullable();
            $table->timestamp('closed_date')->nullable();
            $table->string('form_type')->default('Farmer');
            $table->timestamp('closed_at')->nullable();
            $table->text('aim')->nullable();
            $table->text('description')->nullable();
            $table->text('included_subjects')->nullable();
            $table->string('places')->nullable();
            $table->double('pre_max_mark', 10, 2)->nullable();
            $table->double('pre_min_mark', 10, 2)->nullable();
            $table->double('pre_average_mark', 10, 2)->nullable();
            $table->double('post_max_mark', 10, 2)->nullable();
            $table->double('post_min_mark', 10, 2)->nullable();
            $table->double('post_average_mark', 10, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainings');
    }
};
