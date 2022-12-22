<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('grant_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grant_program_id')->comment('अनुदान कार्यक्रम')->constrained()->cascadeOnDelete();
            $table->foreignId('grant_type_id')->comment('अनुदान प्रकार')->constrained()->cascadeOnDelete();
            $table->foreignId('local_body_id')->comment('स्थानीय निकाय')->constrained()->cascadeOnDelete();
            $table->string('ward_no')->comment('वार्ड');
            $table->string('is_new')->comment('निरन्तरता');
            $table->string('village')->nullable()->comment('गाउँ');
            $table->string('tole')->nullable()->comment('टोल');
            $table->string('Unit_no')->nullable()->comment('कित्ता नं.');
            $table->string('phone')->comment('सम्पर्क नं');
            $table->string('investment')->comment('लगानी');
            $table->string('remarks')->nullable()->comment('कैफियत');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grant_details');
    }
};
