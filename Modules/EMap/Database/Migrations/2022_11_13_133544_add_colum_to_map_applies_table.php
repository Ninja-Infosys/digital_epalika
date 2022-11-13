<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up()
    {
        Schema::table('map_applies', function (Blueprint $table) {
            $table->timestamp('sent_to_admin_at')->nullable();
        });
    }


    public function down()
    {
        Schema::table('map_applies', function (Blueprint $table) {
            $table->dropColumn('sent_to_admin_at');
        });
    }
};
