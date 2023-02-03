<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_details', function (Blueprint $table) {
            $table->double('application_fee', 12, 2)->nullable()->default(0)->comment('निवेदन दस्तुर');
            $table->double('registration_fee', 12, 2)->nullable()->default(0)->comment('दर्ता दस्तुर');
            $table->double('business_tax', 12, 2)->nullable()->default(0)->comment('व्यवसाय कर');
            $table->double('introduction_board_fees', 12, 2)->nullable()->default(0)->comment('परिचय पाटी दस्तुर');
            $table->double('fine', 12, 2)->nullable()->default(0)->comment('जरिवाना');
            $table->string('taxpayer_number')->comment('करदाता नम्बर');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_details', function (Blueprint $table) {
            $table->dropColumn('application_fee','taxpayer_number','registration_fee','business_tax','introduction_board_fees','fine');
        });
    }
};
