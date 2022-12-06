<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('investment_revenues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('object_transaction_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('title')->comment('शिर्षक');
            $table->string('registration_amount')->default('0')->comment('दर्ता शुल्क');
            $table->string('renew_amount')->default('0')->comment('नवीकरण शुल्क');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('investment_revenues');
    }
};
