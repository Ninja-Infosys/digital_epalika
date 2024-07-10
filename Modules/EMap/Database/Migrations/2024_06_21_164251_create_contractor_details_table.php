<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contractor_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_documentation_id')->nullable()->constrained()->cascadeOnDelete();

            $table->string('name')->comment('नाम');
            $table->string('father_name')->nullable()->comment('बुवाको नाम ');
            $table->string('grandfather_name')->nullable()->comment('बाजेको नाम ');
            $table->string('phone')->nullable()->comment('फोन');
            $table->integer('ward_no')->nullable()->comment('वार्ड ');
            $table->string('post')->nullable()->comment('पोस्ट');
            $table->string('nec_council_no')->nullable()->comment('nec काउन्सिल नं');
            $table->string('local_body_registration_no')->nullable()->comment('स्थानीय निकाय दर्ता नं');
            $table->string('consulting_firm_name')->nullable()->comment('परामर्श फर्म नाम');
            $table->foreignId('province_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('district_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('local_body_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('tole')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contractor_details');
    }
};
