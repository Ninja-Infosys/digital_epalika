<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('revenues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('revenue_category_id')->nullable()->constrained('revenue_categories')->cascadeOnDelete();
            $table->string('code_no')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->double('amount', 12, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->text('remarks')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('revenues');
    }
};
