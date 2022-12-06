<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('business_details', function (Blueprint $table) {
            $table->id();
            $table->string('business_type')->comment('निवेदनको प्रकार');
            $table->string('business_detail_name')->nullable()->comment('व्यवसाय विवरण नाम (नेपाली)');
            $table->string('submission_no')->nullable()->comment('सबमिशन नम्बर');
            $table->string('business_detail_name_en')->nullable()->comment('व्यवसाय विवरण नाम (अंग्रेजीमा)');
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
            $table->string('length')->nullable()->comment('लम्बाई');
            $table->string('width')->nullable()->comment('चौडाई');
            $table->string('square')->nullable()->comment('वर्गफिट');
            $table->string('application_fee')->nullable()->comment('निवेदन शुक');
            $table->string('registration_fee')->nullable()->comment('दर्ता शुक');
            $table->string('business_tax')->nullable()->comment('व्यवसाय कर');
            $table->string('introduction_board_fees')->nullable()->comment('परिचय बोर्ड शुल्क');
            $table->string('fine')->nullable()->comment('जरिमाना');
            $table->string('photo')->nullable()->comment('पासपोर्ट साइजको फोटो');
            $table->string('citizenship_front')->nullable()->comment('नागरिकता अपलोड गर्नुहोस् (आगाडी)');
            $table->string('citizenship_back')->nullable()->comment('नागरिकता अपलोड गर्नुहोस् (पछाडी)');
            $table->string('company_registration')->nullable()->comment('फार्म कम्पनी भयमा दर्ता, इजाजत प्रमाणपत्र');
            $table->string('tax_pay_file')->nullable()->comment('आन्तरिक राजस्व कार्यालयमा आघिल्लो आ.व सम्मको करतिरेको करदाता प्रमाणपत्रको प्रतिलिपि');
            $table->string('property')->nullable();
            $table->string('signature')->nullable()->comment('हस्ताक्षर');
            $table->string('thumb')->nullable()->comment(' औठाको छाप');
            $table->foreignId('fiscal_year_id')->nullable()->constrained()->nullOnDelete();
            $table->string('registration_no')->nullable()->comment('दर्ता नम्बर');
            $table->string('registration_date_ne')->nullable()->comment('दर्ता मिति बि. सं.');
            $table->string('registration_date_en')->nullable()->comment('दर्ता मिति ई. सं.');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('business_details');
    }
};
