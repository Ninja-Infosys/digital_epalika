<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recom_detail_revenue_header', function (Blueprint $table) {
            $table->foreignId('recommendation_detail_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('revenue_header_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('recommendation_detail_revenue_header');
    }
};
