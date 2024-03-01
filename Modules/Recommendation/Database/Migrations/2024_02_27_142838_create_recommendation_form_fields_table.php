<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recommendation_form_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recommendation_detail_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('recommendation_form_field_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('field_name');
            $table->string('slug')->nullable();
            $table->string('type');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recommendation_form_fields');
    }
};
