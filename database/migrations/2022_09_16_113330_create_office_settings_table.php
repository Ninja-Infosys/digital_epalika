<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('office_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('logo1')->nullable();
            $table->string('logo2')->nullable();
            $table->string('background_image')->nullable();
            $table->longText('introduction')->nullable();
            $table->text('google_map')->nullable();
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('district_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('local_body_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('fiscal_year_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('ward_no')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('website')->nullable();
            $table->text('facebook_link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('office_settings');
    }
};
