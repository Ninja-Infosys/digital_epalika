<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('submissions_id')->unique()->comment('सबमिशन आईडी');
            $table->string('registration_no')->nullable()->unique()->comment('दर्ता नं.');
            $table->string('registration_date')->nullable()->comment('दर्ता मिति_np');
            $table->string('registration_date_en')->nullable()->comment('दर्ता मिति_en');
            $table->foreignId('fiscal_year_id')->comment('आर्थिक बर्ष')->nullable()->constrained()->nullOnDelete();
            $table->string('tax_payer_number')->nullable()->comment('करदाता नं.');
//            business
            $table->string('name')->comment('व्यवसायको नाम');
            $table->string('business_start_date')->comment('व्यवसाय सुरु मिति');
            $table->foreignId('business_nature_id')->comment('व्यापार प्रकृति')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('object_transaction_id')->comment('व्यापार वर्ग ')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('province_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->foreignId('local_body_id')->constrained();
            $table->string('address')->comment('ठेगाना ');
            $table->string('ward_no')->comment('वार्ड नं.');
            $table->string('tole')->comment('टोल');
            $table->string('street_name')->nullable()->comment('बाटोको नाम');
            $table->string('house_number')->nullable()->comment('व्यवसायको घर नं ');
            $table->string('capital_investment')->comment('कुल पुँजी');
            $table->string('working_capital')->comment('चालु पुँजी');
            $table->string('fixed_capital')->comment('थिर पुँजी');
            $table->string('board_size')->comment('परिचय पार्टी साइज');
//            owner
            $table->string('owner_name')->comment('व्यवसायीको नाम');
            $table->string('citizenship_number')->comment('नागरिकता नम्बर');
            $table->string('citizenship_issue_date')->comment('नागरिकता जारी मिति');
            $table->string('citizenship_issue_district_id')->comment('नागरिकता जारी जिल्ला');
            $table->string('business_rent_owner')->comment('जग्गाधनिको नाम ');
            $table->string('owner_photo')->comment('व्यवसायीको फोटो');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('businesses');
    }
};
