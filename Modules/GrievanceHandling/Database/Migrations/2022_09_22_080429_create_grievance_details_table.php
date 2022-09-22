<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('grievance_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grievance_type_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('grievance_office_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('subject')->nullable();
            $table->longText('description')->nullable();
            $table->string('complaint_severity');
            $table->boolean('is_open')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grievance_details');
    }
};
