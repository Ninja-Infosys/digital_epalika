<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    public function up()
    {
        Schema::create('recommendation_creates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recommendation_detail_id')->constrained()->onDelete('cascade');
            $table->foreignId('signature_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->date('approved_date')->nullable();
            $table->string('approved_status')->default('1');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('mobile_user_id')->nullable()->constrained();
            $table->foreignId('personal_detail_id')->nullable()->constrained();
            $table->string('file')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recommendation_creates');
    }
};
