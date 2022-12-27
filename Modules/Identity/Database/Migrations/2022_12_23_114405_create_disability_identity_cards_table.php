<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('disability_identity_cards', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('finger_print_type')->nullable();
            $table->string('finger_left')->nullable();
            $table->string('finger_right')->nullable();
            $table->string('name');
            $table->string('name_en');
            $table->string('gender');
            $table->foreignId('ethnicity_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('dob_ad');
            $table->string('dob_bs');
            $table->foreignId('temporary_province_id')->nullable()->constrained('provinces')->nullOnDelete()->onUpdate('no action');
            $table->foreignId('temporary_district_id')->nullable()->constrained('districts')->nullOnDelete()->onUpdate('no action');
            $table->foreignId('temporary_local_body_id')->nullable()->constrained('local_bodies')->nullOnDelete()->onUpdate('no action');
            $table->string('temporary_ward')->nullable();
            $table->foreignId('permanent_province_id')->nullable()->constrained('provinces')->nullOnDelete()->onUpdate('no action');
            $table->foreignId('permanent_district_id')->nullable()->constrained('districts')->nullOnDelete()->onUpdate('no action');
            $table->foreignId('permanent_local_body_id')->nullable()->constrained('local_bodies')->nullOnDelete()->onUpdate('no action');
            $table->string('permanent_ward')->nullable();
            $table->string('guardian_name');
            $table->string('guardian_name_en');
            $table->foreignId('relationship_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('phone');
            $table->foreignId('disability_type_id')-> nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('blood_group');
            $table->foreignId('disability_reason_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('receiving_body');
            $table->string('card_no');
            $table->string('date_ad');
            $table->string('date_bs');
            $table->string('father_name');
            $table->string('father_name_en');
            $table->string('grand_father_name');
            $table->string('grand_father_name_en');
            $table->string('mother_name');
            $table->string('mother_name_en');
            $table->string('birth_registration_no');
            $table->string('birth_registration_place');
            $table->string('birth_registration_bs');
            $table->string('birth_registration_ad');
            $table->string('citizenship_no');
            $table->string('citizenship_no_place');
            $table->string('citizenship_no_bs');
            $table->string('citizenship_no_ad');
            $table->string('citizenship_photo');
            $table->string('citizenship_photo_certificate');
            $table->string('qualification');
            $table->string('material_description');
            $table->boolean('daily_activity')->default(0);
            $table->boolean('supporting_material')->default(0);
            $table->string('helping_task');
            $table->string('without_helping_task');
            $table->string('main_training_name');
            $table->foreignId('occupation_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('provide_detail_full_name');
            $table->string('provide_detail_address')->nullable();
            $table->string('provide_detail_phone_no')->nullable();
            $table->string('provide_detail_citizenship_no')->nullable();
            $table->string('provide_detail_citizenship_no_date')->nullable();
            $table->string('provide_detail_citizenship_no_place')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('disability_identity_cards');
    }
};
