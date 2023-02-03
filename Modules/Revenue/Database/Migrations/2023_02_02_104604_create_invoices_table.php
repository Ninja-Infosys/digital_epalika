<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->unique();
            $table->foreignId('tax_payer_id')->constrained('tax_payers');
            $table->foreignId('fiscal_year_id')->constrained('fiscal_years');
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->string('address');
            $table->string('payment_method');
            $table->string('reference_code')->nullable();
            $table->string('payment_date');
            $table->string('payment_date_en');
            $table->string('ward')->nullable();
            $table->text('remarks')->nullable();
            $table->string('invoice_copy')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
