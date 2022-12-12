<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no')->comment('दर्ता नं');
            $table->foreignId('fiscal_year_id')->comment('वित्तीय वर्ष')->constrained()->cascadeOnDelete();
            $table->string('project_name')->comment('परियोजनाको नाम');
            $table->foreignId('plan_area_id')->nullable()->comment('योजना क्षेत्र')->constrained()->nullOnDelete();
            $table->string('project_status')->comment('परियोजना स्थिति');
            $table->string('project_start_date')->nullable()->comment('परियोजना सुरु मिति');
            $table->string('project_completion_date')->nullable()->comment('परियोजना पूरा हुने समय');
            $table->foreignId('plan_level_id')->nullable()->comment('योजना स्तर')->constrained()->nullOnDelete();
            $table->integer('ward_no')->nullable()->comment('वार्ड नं');
            $table->foreignId('budget_source_id')->nullable()->comment('बजेट स्रोत')->constrained()->nullOnDelete();
            $table->foreignId('budget_head_id')->nullable()->comment('बजेट शीर्षक')->constrained()->nullOnDelete();
            $table->double('allocated_amount',12,2)->default(0)->comment('आवंटित रकम');
            $table->string('project_venue')->nullable()->comment('परियोजना स्थल');
            $table->double('evaluation_amount',12,2)->default(0)->comment('मूल्याङ्कन रकम');
            $table->string('purpose')->nullable()->comment('उद्देश्य');
            $table->string('operated_through')->comment('मार्फत सञ्चालन');
            $table->boolean('is_deadline_extended')->default(0)->comment('म्याद थपिएको');
            $table->string('extended_date')->nullable()->comment('विस्तारित मिति');
            $table->double('progress_spent_amount',12,2)->default(0)->comment('प्रगति खर्च रकम');
            $table->double('physical_progress_target',12,2)->default(0)->comment('भौतिक प्रगति लक्ष्य');
            $table->double('physical_progress_completed',12,2)->default(0)->comment('भौतिक प्रगति पूरा');
            $table->string('physical_progress_unit')->nullable()->comment('भौतिक प्रगति एकाइ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
