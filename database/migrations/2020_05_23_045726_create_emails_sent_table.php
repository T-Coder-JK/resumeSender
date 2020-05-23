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
        Schema::create('emails_sent', function (Blueprint $table) {
            $table->id();
            $table->string('sender');
            $table->string('receiver');
            $table->timestamp('sent_at');
            $table->foreignId('email_template_id')->constrained('email_templates');
            $table->foreignId('cover_letter_template_id')->constrained('cover_letter_templates');
            $table->foreignId('resume_template_id')->constrained('resume_templates');
            $table->longText('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails_sent');
    }
}
