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
        Schema::table('e_map_templates', function (Blueprint $table) {
            $table->boolean('status')->default(0)->comment('स्थिति');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('e_map_templates', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
