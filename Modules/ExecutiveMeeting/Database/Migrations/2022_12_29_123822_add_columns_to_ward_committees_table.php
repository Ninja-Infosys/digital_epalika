<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

    public function up()
    {
        Schema::table('ward_committees', function (Blueprint $table) {
            $table->string('committee_ward')->comment('समिति वार्ड');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
        });
    }


    public function down()
    {
        Schema::table('ward_committees', function (Blueprint $table) {
            $table->dropColumn('committee_ward');
            $table->dropConstrainedForeignId('user_id');
        });
    }
};
