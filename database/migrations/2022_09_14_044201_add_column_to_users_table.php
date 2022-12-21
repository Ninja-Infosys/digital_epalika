<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->foreignId('user_id')->after('id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('role_id')->after('phone')->constrained();
            $table->boolean('is_active')->default(1)->after('role_id');
            $table->foreignId('province_id')->nullable()->after('password')->constrained()->nullOnDelete();
            $table->foreignId('district_id')->nullable()->after('province_id')->constrained()->nullOnDelete();
            $table->foreignId('local_body_id')->nullable()->after('district_id')->constrained()->nullOnDelete();
            $table->integer('ward_no')->nullable()->after('local_body_id');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropForeign('user_id');
            $table->dropForeign('role_id');
            $table->dropColumn('is_active');
            $table->dropForeign('province_id');
            $table->dropForeign('district_id');
            $table->dropForeign('local_body_id');
            $table->dropColumn('ward_no');
            $table->dropSoftDeletes();
        });
    }
};
