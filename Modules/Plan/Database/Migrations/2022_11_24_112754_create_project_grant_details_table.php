<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('project_grant_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->comment('परियोजना आईडी')->constrained()->cascadeOnDelete();
            $table->string('grant_source')->comment('अनुदान स्रोत');
            $table->string('asset_name')->comment('सम्पत्ति नाम');
            $table->double('quantity',12,2)->default(0)->comment('मात्रा');
            $table->string('asset_unit')->comment('सम्पत्ति एकाइ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_grant_details');
    }
};
