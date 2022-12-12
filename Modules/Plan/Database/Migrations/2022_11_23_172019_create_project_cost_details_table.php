<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('project_cost_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->comment('कार्यक्रम आईडी')->constrained()->cascadeOnDelete();
            $table->double('estimated_total_cost',12,2)->default(0)->comment('अनुमानित कुल लागत');
            $table->double('federal_invest',12,2)->default(0)->comment('संघीय लगानी');
            $table->double('province_invest',12,2)->default(0)->comment('प्रदेशको लगानी');
            $table->double('local_level_invest',12,2)->default(0)->comment('स्थानीय तहको लगानी');
            $table->double('consumer_committee_invest',12,2)->default(0)->comment('उपभोक्ता समितिको लगानी');
            $table->double('ngo_invest',12,2)->default(0)->comment('एनजीओको लगानी');
            $table->double('foreign_donor_invest',12,2)->default(0)->comment('विदेशी दाताको लगानी');
            $table->double('others_invest',12,2)->default(0)->comment('अरू लगानी');
            $table->double('estimated_cost_excluding_vat',12,2)->default(0)->comment('भ्याट बाहेक अनुमानित लागत');
            $table->double('benefited_organization',12,2)->default(0)->comment('लाभान्वित संस्था');
            $table->double('others_benefited',12,2)->default(0)->comment('अन्य लाभान्वित');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_cost_details');
    }
};
