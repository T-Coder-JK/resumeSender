<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsSavedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_emails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('sender_email')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('receiver_email')->nullable();
            $table->string('receive_name')->nullable();
            $table->foreignId('email_template_id')->nullable()->constrained('email_templates');
            $table->foreignId('cover_letter_template_id')->nullable()->constrained('cover_letter_templates');
            $table->foreignId('resume_template_id')->nullable()->constrained('resume_templates');
            $table->longText('content')->nullable();
            $table->softDeletes('deleted_at',0);
            $table->foreignId('application_id')->nullable()->constrained('applications');
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saved_emails');
    }
}
