<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('disability_identity_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_en');
            $table->string('citizenship_no')->nullable();
            $table->string('birth_registration_no')->nullable();
            $table->string('father_name');
            $table->string('father_name_en');
            $table->string('mother_name');
            $table->string('mother_name_en');
            $table->string('dob');
            $table->date('dob_ad');
            $table->string('gender');
            $table->foreignId('province_id')->nullable()->constrained('provinces')->nullOnDelete()->onUpdate('no action');
            $table->foreignId('district_id')->nullable()->constrained('districts')->nullOnDelete()->onUpdate('no action');
            $table->foreignId('local_body_id')->nullable()->constrained('local_bodies')->nullOnDelete()->onUpdate('no action');
            $table->integer('ward_no');
            $table->string('tole');
            $table->string('photo')->nullable();
            $table->string('guardian_name');
            $table->string('guardian_name_en');
            $table->foreignId('relationship_id')->nullable()->constrained('relationships')->nullOnDelete()->onUpdate('no action');
            $table->string('phone')->nullable();
            $table->foreignId('disability_type_id')->nullable()->constrained('disability_types')->nullOnDelete()->onUpdate('no action');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('disability_identity_cards');
    }
};
