<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('investment_revenues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('object_transaction_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('title');
            $table->string('registration_amount')->default('0');
            $table->string('renew_amount')->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('investment_revenues');
    }
};
