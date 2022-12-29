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
            $table->string('dob_ad')->nullable();
            $table->string('dob_bs')->nullable();
            $table->foreignId('temporary_province_id')->nullable()->constrained('provinces')->nullOnDelete()->onUpdate('no action');
            $table->foreignId('temporary_district_id')->nullable()->constrained('districts')->nullOnDelete()->onUpdate('no action');
            $table->foreignId('temporary_local_body_id')->nullable()->constrained('local_bodies')->nullOnDelete()->onUpdate('no action');
            $table->string('temporary_ward')->nullable();
            $table->foreignId('permanent_province_id')->nullable()->constrained('provinces')->nullOnDelete()->onUpdate('no action');
            $table->foreignId('permanent_district_id')->nullable()->constrained('districts')->nullOnDelete()->onUpdate('no action');
            $table->foreignId('permanent_local_body_id')->nullable()->constrained('local_bodies')->nullOnDelete()->onUpdate('no action');
            $table->string('permanent_ward')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_name_en')->nullable();
            $table->foreignId('relationship_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('phone')->nullable();
            $table->foreignId('disability_type_id')-> nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('blood_group')->nullable();
            $table->foreignId('disability_reason_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('receiving_body')->nullable();
            $table->string('card_no')->nullable();
            $table->string('date_ad')->nullable();
            $table->string('date_bs')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_name_en')->nullable();
            $table->string('grand_father_name')->nullable();
            $table->string('grand_father_name_en')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_name_en')->nullable();
            $table->string('birth_registration_no')->nullable();
            $table->string('birth_registration_place')->nullable();
            $table->string('birth_registration_bs')->nullable();
            $table->string('birth_registration_ad')->nullable();
            $table->string('citizenship_no')->nullable();
            $table->string('citizenship_no_place')->nullable();
            $table->string('citizenship_no_bs')->nullable();
            $table->string('citizenship_no_ad')->nullable();
            $table->string('citizenship_photo')->nullable();
            $table->string('citizenship_photo_certificate')->nullable();
            $table->string('qualification')->nullable();
            $table->string('material_description')->nullable();
            $table->boolean('daily_activity')->default(0)->nullable();
            $table->boolean('supporting_material')->default(0)->nullable();
            $table->longText('helping_task')->nullable();
            $table->longText('without_helping_task')->nullable();
            $table->string('main_training_name')->nullable();
            $table->foreignId('occupation_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('employee_signature_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('govern_disability_type_id')->nullable()->constrained('governmental_disability_types')->nullOnDelete()->onUpdate('no action');
            $table->string('provide_detail_full_name')->nullable();
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
