<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('grant_category_id')->nullable()->comment('अनुदान किसिम')->constrained();
            $table->foreignId('expense_head_id')->nullable()->comment('खर्चको किसिम')->constrained();
            $table->double('office_grant',12,2)->default(0)->comment('कार्यालयबाट अनुदान रकम');
            $table->double('contingency_amount',12,2)->default(0)->comment('कन्टिन्जेन्सी रकम');
            $table->double('other_taxes',12,2)->default(0)->comment('अन्य कर');
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {

        });
    }
};
