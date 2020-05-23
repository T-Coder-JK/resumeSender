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
        Schema::create('emails_saved', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('sender');
            $table->string('receiver');
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
        Schema::dropIfExists('emails_saved');
    }
}
