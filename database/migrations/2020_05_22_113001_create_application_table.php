<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamp('applied_at')->nullable();
            $table->timestamps();
            $table->string('job_ad')->nullable();
            $table->foreignId('company_id')->nullable()->constrained('companies');
            $table->string('job_title');
            $table->boolean('interview')->default(0);
            $table->boolean('got_reply')->default(0);
            $table->string('job_type');
            $table->string('salary')->nullable();
            $table->longText('additional_description')->nullable();
            $table->integer('personal_rank')->nullable();
            $table->integer('possibility')->nullable();
            $table->foreignId('email_templates_id')->nullable()->constrained('email_templates');
            $table->foreignId('cover_letter_id')->nullable()->constrained('cover_letter_templates');
            $table->foreignId('resume_id')->nullable()->constrained('resume_templates');
            $table->softDeletes('deleted_at',0);
            $table->index('user_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
