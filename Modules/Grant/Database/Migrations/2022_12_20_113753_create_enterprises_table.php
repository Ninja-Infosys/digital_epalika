<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable()->unique();
            $table->foreignId('enterprise_type_id')->constrained();
            $table->string('name');
            $table->string('vat_pan')->nullable();
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('district_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('local_body_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('ward_no')->nullable();
            $table->string('village')->nullable();
            $table->string('tole')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enterprises');
    }
};
