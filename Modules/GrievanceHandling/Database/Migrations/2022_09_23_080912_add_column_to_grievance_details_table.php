<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

    public function up()
    {
        Schema::table('grievance_details', function (Blueprint $table) {
            $table->string('status')->default('Unseen');
        });
    }

    public function down()
    {
        Schema::table('grievance_details', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
