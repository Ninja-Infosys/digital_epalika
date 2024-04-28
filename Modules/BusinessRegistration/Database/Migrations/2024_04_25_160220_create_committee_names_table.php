<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('committee_names', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_registration_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('name')->comment('नाम');
            $table->string('name_en')->comment('नाम अंग्रेजीमा');
            $table->string('citizenship_no')->comment('नागरिकता नम्बर');
            $table->string('issue_date')->comment('जारि मिति');
            $table->foreignId('issue_district_id')->nullable()->comment('नागरिकता जारी जिल्ला')->constrained('districts')->nullOnDelete()->onUpdate('no action');
            $table->string('phone')->nullable()->comment('फोन');
            $table->string('email')->nullable()->comment('इमेल');
            $table->string('designation')->nullable()->comment('पद');
            $table->foreignId('province_id')->nullable()->comment('प्रदेश')->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('district_id')->nullable()->comment('जिल्ला')->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('local_body_id')->nullable()->comment('पालिका')->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('ward_no')->nullable()->comment('वडा नं');
            $table->string('way')->nullable()->comment('मार्ग');
            $table->string('tole')->nullable()->comment('टोल');
            $table->string('national_card_no')->nullable()->comment('राष्ट्रियता परिचयपत्र नम्बर');
            $table->string('gender')->nullable()->comment('लिङ्ग');
            $table->string('father_name')->nullable()->comment('बुबाको नाम');
            $table->string('grandfather_name')->nullable()->comment('हजुरबुबाको नाम');
            $table->string('photo')->nullable()->comment('पासपोर्ट साइजको फोटो');
            $table->string('citizenship_front')->nullable()->comment('नागरिकता (आगाडी)');
            $table->string('citizenship_back')->nullable()->comment('नागरिकता (पछाडी)');
            $table->integer('position');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('committee_names');
    }
};
