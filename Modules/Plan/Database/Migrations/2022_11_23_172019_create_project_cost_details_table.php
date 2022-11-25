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
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->double('estimated_total_cost',12,2)->default(0);
            $table->double('federal_invest',12,2)->default(0);
            $table->double('province_invest',12,2)->default(0);
            $table->double('local_level_invest',12,2)->default(0);
            $table->double('consumer_committee_invest',12,2)->default(0);
            $table->double('ngo_invest',12,2)->default(0);
            $table->double('foreign_donor_invest',12,2)->default(0);
            $table->double('others_invest',12,2)->default(0);
            $table->double('estimated_cost_excluding_vat',12,2)->default(0);
            $table->double('benefited_organization',12,2)->default(0);
            $table->double('others_benefited',12,2)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_cost_details');
    }
};
