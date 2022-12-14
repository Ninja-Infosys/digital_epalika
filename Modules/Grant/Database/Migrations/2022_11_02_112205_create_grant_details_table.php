<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('grant_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiscal_year_id')->comment('आर्थिक बर्ष')->constrained()->cascadeOnDelete();
            $table->foreignId('grant_program_id')->constrained()->cascadeOnDelete();
            $table->string('grant_recipient_name')->comment('अनुदान प्राप्तकर्ताको नाम');
            $table->string('grant_recipient_code_no')->nullable()->comment('अनुदान प्राप्तकर्ता कोड');
            $table->foreignId('province_id')->comment('प्रदेश')->constrained()->cascadeOnDelete();
            $table->foreignId('district_id')->comment('जिल्ला')->constrained()->cascadeOnDelete();
            $table->foreignId('local_body_id')->comment('पालिका')->constrained()->cascadeOnDelete();
            $table->integer('ward_no')->nullable()->comment('वार्ड नं');
            $table->string('tole')->nullable()->comment('टोल');
            $table->string('grant_recipient_type')->nullable()->comment('अनुदान प्राप्तकर्ता प्रकार');
            $table->foreignId('grant_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('grant_activity_id')->constrained()->cascadeOnDelete();
            $table->double('total_cost', 12, 2)->default(0)->comment('कुल खर्च');
            $table->double('grant_amount', 12, 2)->default(0)->comment('अनुदान रकम');
            $table->double('investment_amount', 12, 2)->default(0)->comment('लगानी रकम');
            $table->string('beneficial_area')->nullable()->comment('लाभदायक क्षेत्र');
            $table->string('contact_person_name')->nullable()->comment('सम्पर्क व्यक्तिको नाम');
            $table->string('phone')->nullable()->comment('फोन');
            $table->boolean('is_continuity')->default(0)->comment('निरन्तरता');
            $table->foreignId('prev_fiscal_year_id')->nullable()->constrained('fiscal_years');
            $table->double('prev_cost_amount', 12, 2)->nullable()->comment('अघिल्लो लागत रकम');
            $table->text('beneficial_places')->nullable()->comment('लाभदायक ठाउँहरू');
            $table->text('remarks')->nullable()->comment('कैफियत');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grant_details');
    }
};
