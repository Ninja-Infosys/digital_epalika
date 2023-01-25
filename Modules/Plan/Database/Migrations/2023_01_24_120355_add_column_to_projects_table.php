<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->double('first_quarterly_amount', 12, 2)->default(0)->comment('पहिलो चौमासिक रकम');
            $table->double('first_quarterly_goal', 12, 2)->default(0)->comment('पहिलो चौमासिक लक्ष्य');
            $table->double('second_quarterly_amount', 12, 2)->default(0)->comment('दोश्रो चौमासिक रकम');
            $table->double('second_quarterly_goal', 12, 2)->default(0)->comment('दोश्रो चौमासिक लक्ष्य');
            $table->double('third_quarterly_amount', 12, 2)->default(0)->comment('तेश्रो चौमासिक रकम');
            $table->double('third_quarterly_goal', 12, 2)->default(0)->comment('तेश्रो चौमासिक लक्ष्य');
            $table->double('agencies_grants', 12, 2)->default(0)->comment('अन्य निकायबाट प्राप्त अनुदान');
            $table->double('share_amount', 12, 2)->default(0)->comment('अन्य साझेदारी रकम');
            $table->double('committee_share_amount', 12, 2)->default(0)->comment('समितिबाट नगद साझेदारी रकम');
            $table->double('labor_amount', 12, 2)->default(0)->comment('समितिबाट जनश्रमदान रकम ');
            $table->double('benefited_organization', 12, 2)->default(0)->comment('लाभान्वित संस्था');
            $table->double('others_benefited', 12, 2)->default(0)->comment('अन्य लाभान्वित');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {

        });
    }
};
