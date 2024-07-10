<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('apply_building_notices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_documentation_id')->constrained()->cascadeOnDelete();
            $table->longText('data')->comment('मिति ');
            $table->text('file_type')->comment('फाइलको प्रकार ');
            $table->string('remarks')->nullable()->comment('कैफियत ');
            $table->string('type')->default('Unseen');
            $table->timestamp('sent_to_admin_at')->nullable()->comment('admin लाई पठाएको मिति ');
            $table->timestamp('rejected_at')->nullable()->comment('अस्विकार मिति ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apply_building_notices');
    }
};
