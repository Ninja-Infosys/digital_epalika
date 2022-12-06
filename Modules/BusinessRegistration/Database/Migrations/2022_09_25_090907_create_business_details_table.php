<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('business_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proprietor_detail_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('business_detail_name')->nullable()->comment('व्यवसाय विवरण नाम');
            $table->string('submission_no')->nullable()->comment('सबमिशन नम्बर');
            $table->string('business_detail_name_en')->nullable();
            $table->string('establish_year')->nullable()->comment('स्थापना वर्ष');
            $table->string('business_nature')->nullable()->comment('व्यवसाय को प्रकृति');
            $table->string('registration_date')->nullable()->comment('दर्ता मिति');
            $table->string('pan_no')->nullable()->comment('प्यान नम्बर');
            $table->boolean('is_registered')->default(0);
            $table->boolean('is_rent')->default(0);
            $table->string('amount_cost')->nullable()->comment('लागत रकम');
            $table->string('source_of_capital')->nullable()->comment('पुँजीको स्रोत');
            $table->string('purpose')->nullable()->comment('उद्देश्य');
            $table->string('employment')->nullable()->comment('रोजगारी');
            $table->string('house_owner_name')->nullable()->comment('घर मालिकको नाम');
            $table->string('house_owner_phone')->nullable()->comment('घर मालिकको फोन');
            $table->string('house_owner_address')->nullable()->comment('घर मालिकको ठेगाना');
            $table->string('house_owner_monthly_rent')->nullable()->comment('घर मालिक मासिक भाडा');
            $table->foreignId('province_id')->nullable()->comment('प्रदेश')->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('district_id')->nullable()->comment('जिल्ला')->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('local_body_id')->nullable()->comment('पालिका')->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('investment_revenue_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('ward_no')->nullable()->comment('वार्ड');
            $table->string('way')->nullable()->comment('मार्ग');
            $table->string('tole')->nullable()->comment(' गाउ/टोल ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('business_details');
    }
};
