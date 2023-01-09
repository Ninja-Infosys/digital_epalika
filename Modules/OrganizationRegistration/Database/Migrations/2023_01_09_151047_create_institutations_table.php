<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->comment('प्रयोगकर्ता')->constrained();
            $table->string('registration_no')->comment('दर्ता मिति नं.');
            $table->string('registration_date')->comment('दर्ता मिति वि.सं.');
            $table->string('registration_date_en')->comment('')->comment('दर्ता मिति ई.सं.');
            $table->string('name')->comment('संस्थाको नाम');
            $table->foreignId('province_id')->comment('प्रदेश')->constrained();
            $table->foreignId('district_id')->comment('जिल्ला')->constrained();
            $table->foreignId('local_body_id')->comment('स्थानीय तह')->constrained();
            $table->string('ward_no')->comment('वार्ड नं.');
            $table->string('institution_address')->nullable()->comment('संस्थाको ठेगाना');
            $table->string('contact_no')->comment('संस्थाको सम्पर्क नं.');
            $table->string('email')->comment('संस्थाको ईमेल');
            $table->string('dao_registration_no')->comment('जिल्ला प्रशासन कार्यालय दर्ता नं.');
            $table->string('dao_registration_date')->comment('जिल्ला प्रशासन कार्यालय दर्ता मिति वि.सं.');
            $table->string('dao_registration_date_en')->comment('जिल्ला प्रशासन कार्यालय दर्ता मिति ई.सं.');
            $table->string('swc_registration_no')->comment('समाज कल्याण परिषद् दर्ता नं.');
            $table->string('swc_registration_date')->comment('समाज कल्याण परिषद् दर्ता मिति वि.सं.');
            $table->string('swc_registration_date_en')->comment('समाज कल्याण परिषद् दर्ता मिति ई.सं.');
            $table->string('pan_vat')->nullable()->comment('आन्तरिक राजस्व कार्यालय PAN/VAT नं.');
            $table->text('objective')->comment('संस्थाको मुख्य उद्देश्य ');
            $table->text('area')->comment('संस्थाको कार्य क्षेत्र');

            //Institutional documents
            $table->string('minute')->comment('माइनुट');
            $table->string('application')->comment('निवेदन');
            $table->string('Legislation')->comment('विधान');
            $table->string('Ward_recommendation')->comment('वार्डको सिफारिस');
            $table->string('stamp')->comment('संस्थाको छाप');


            //approval detail
            $table->string('proposed_person')->comment('प्रस्तावित गर्ने');
            $table->string('supervisor_person')->comment('निरीक्षक गर्ने');
            $table->string('approval_person')->comment('प्रमाणित गर्ने');
            $table->string('proposed_person_designation')->comment('प्रस्तावित गर्नेको पद');
            $table->string('supervisor_person_designation')->comment('निरीक्षण गर्नेको पद');
            $table->string('approval_person_designation')->comment('प्रमाणित गर्नेको पद');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('institutions');
    }
};
