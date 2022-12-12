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
        Schema::table('form_builders', function (Blueprint $table) {
            $table->boolean('status')->default(0)->comment('स्थिति');
            $table->string('title')->nullable()->comment('शीर्षक');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_builders', function (Blueprint $table) {
            $table->dropColumn('status','title');
        });
    }
};
