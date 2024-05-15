<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->id();
            $table->integer('reg_no')->default(0);
            $table->string('submission_no')->nullable()->comment('सबमिशन नम्बर');
            $table->foreignId('fiscal_year_id')->nullable()->comment('आर्थिक बर्ष')->constrained()->nullOnDelete();
            $table->string('registration_no')->nullable()->comment('दर्ता नम्बर');
            $table->string('registration_date_ne')->nullable()->comment('दर्ता मिति बि. सं.');
            $table->string('registration_date_en')->nullable()->comment('दर्ता मिति ई. सं.');
            $table->string('name')->comment('फर्मको नाम');
            $table->string('name_en')->comment('फर्मको नाम(अंग्रेजीमा)');
            $table->string('owner_name')->comment('प्रोप्राईटरको नाम');
            $table->string('phone')->comment('सम्पर्क नं नाम');
            $table->string('email')->comment('इमेल');
            $table->string('address')->comment('ठेगाना');
            $table->string('address_en')->comment('ठेगाना(अंग्रेजीमा)');
            $table->text('purpose')->nullable()->comment('उद्देश्य');
            $table->foreignId('province_id')->nullable()->comment('प्रदेश')->constrained();
            $table->foreignId('district_id')->nullable()->comment('जिल्ला')->constrained();
            $table->foreignId('local_body_id')->nullable()->comment('पालिका')->constrained();
            $table->string('ward_no')->nullable()->comment('वडा नं');
            $table->string('way')->nullable()->comment('मार्ग');
            $table->string('tole')->nullable()->comment('गाउ/टोल');
            $table->string('investment')->nullable()->comment('कूल पूँजी');
            $table->string('product')->nullable()->comment('कारोबार विवरण');
            $table->string('East')->nullable()->comment('पुर्ब');
            $table->string('West')->nullable()->comment('पश्चिम');
            $table->string('North')->nullable()->comment('उत्तर');
            $table->string('South')->nullable()->comment('दक्षिण');
            $table->string('plot_no')->nullable()->comment('जग्गाको कित्ता नं');
            $table->string('area')->nullable()->comment('जग्गाको क्षेत्रफल');
            $table->string('establish_date')->nullable()->comment('फर्म संचालन मिति');
            $table->string('application_date')->nullable()->comment('आवेदन मिति बि. सं.');
            $table->string('application_date_en')->nullable()->comment('आवेदन मिति ई. सं.');
            $table->string('bill_no')->nullable()->comment('बिल नं.');
            $table->string('bill_date_bs')->nullable()->comment('बिल मिति बि स.');
            $table->string('bill_date_ad')->nullable()->comment('बिल मिति ई स.');
            $table->double('amount', 12, 2)->nullable()->default(0)->comment('रकम');
            $table->string('taxpayer_number')->nullable()->comment('करदाता नम्बर');
            $table->string('other')->nullable()->comment('अन्य');
            $table->string('other_file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('forums');
    }
};
