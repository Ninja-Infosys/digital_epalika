<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('object_transaction_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category_a')->nullable();
            $table->string('category_b')->nullable();
            $table->string('category_c')->nullable();
            $table->foreignId('object_transaction_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('object_transaction_sub_categories');
    }
};
