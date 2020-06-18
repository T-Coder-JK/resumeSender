<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsSentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sent_emails', function (Blueprint $table) {
            $table->id();
            $table->string('sender_email');
            $table->string('sender_name');
            $table->string('receiver_email');
            $table->string('receive_name');
            $table->timestamps();
            $table->foreignId('email_template_id')->nullable()->constrained('email_templates');
            $table->foreignId('cover_letter_template_id')->nullable()->constrained('cover_letter_templates');
            $table->foreignId('resume_template_id')->nullable()->constrained('resume_templates');
            $table->longText('content')->nullable();
            $table->softDeletes('deleter_at',0);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('application_id')->nullable()->constrained('applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sent_emails');
    }
}
