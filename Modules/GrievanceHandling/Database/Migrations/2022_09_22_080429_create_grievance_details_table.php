<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('grievance_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grievance_detail_id')->nullable()->constrained();
            $table->string('token')->unique()->nullable()->comment('टोकन');
            $table->foreignId('grievance_user_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('grievance_type_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('grievance_office_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('subject')->nullable()->comment('विषय');
            $table->longText('description')->nullable()->comment('विवरण');
            $table->string('complaint_severity')->nullable()->comment('गुनासो गम्भीरता');
            $table->string('grievance_medium')->nullable();
            $table->boolean('is_open')->default(0)->comment('खोल्नुहोस्');
            $table->boolean('is_approved')->default(0)->comment('स्वीकृत');
            $table->boolean('is_public')->default(0)->comment('सार्वजनिक');
            $table->string('status')->default('unseen')->comment('स्थिति');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grievance_details');
    }
};
