<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('tax_payers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tax_payer_type_id')->constrained('tax_payer_types');
            $table->foreignId('fiscal_year_id')->constrained('fiscal_years');
            $table->foreignId('user_id')->constrained('users');
            $table->string('registration_no');
            $table->string('name');
            $table->string('name_en');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('father_name')->nullable();
            $table->string('grandfather_name')->nullable();
            $table->string('citizenship_no');
            $table->string('issued_district');
            $table->string('issued_date');
            $table->string('ward');
            $table->string('tole');
            $table->text('remarks')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tax_payers');
    }
};
