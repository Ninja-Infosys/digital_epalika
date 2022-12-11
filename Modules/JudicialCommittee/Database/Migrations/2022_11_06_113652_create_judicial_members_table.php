<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('judicial_members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('नाम');
            $table->string('photo')->nullable()->comment('फोटो');
            $table->integer('position')->comment('स्थान');
            $table->foreignId('designation_id')->nullable()->constrained()->nullOnDelete();
            $table->string('phone')->nullable()->comment('फोन');
            $table->foreignId('province_id')->nullable()->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('local_body_id')->nullable()->constrained();
            $table->integer('ward_no')->nullable()->comment('वार्ड नं');
            $table->string('tole')->nullable()->comment('टोल');
            $table->string('gender')->comment('लिङ्ग');
            $table->string('dob')->nullable()->comment('जन्म मिति');
            $table->string('en_dob')->nullable()->comment('जन्म मिति अंग्रेजी');
            $table->string('blood_group')->nullable()->comment('रक्त समूह');
            $table->string('father_name')->nullable()->comment('बुबाको नाम');
            $table->string('mother_name')->nullable()->comment('आमाको नाम');
            $table->string('grandfather_name')->nullable()->comment('हजुरबुबाको नाम');
            $table->boolean('status')->default(1)->comment('स्थिति');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('judicial_members');
    }
};
