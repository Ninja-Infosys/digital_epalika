<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('written_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complaint_application_id')->constrained()->cascadeOnDelete();
            $table->longText('description');
            $table->string('submitted_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('written_answers');
    }
};
