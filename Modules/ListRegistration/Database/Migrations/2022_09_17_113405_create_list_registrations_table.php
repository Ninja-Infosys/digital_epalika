<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('list_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no');
            $table->string('applicant_type')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('mailing_address')->nullable();
            $table->string('main_person')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('application_photo')->nullable();
            $table->string('registration_certificate')->nullable();
            $table->string('pan_photo')->nullable();
            $table->string('tax_payment_certificate')->nullable();
            $table->string('license_photo')->nullable();
            $table->string('business_nature')->nullable();
            $table->longText('business_nature_description')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('list_registrations');
    }
};
