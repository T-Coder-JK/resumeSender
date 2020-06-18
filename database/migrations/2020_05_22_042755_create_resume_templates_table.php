<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_templates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->softDeletes('deleted_at',0);
            $table->foreignId('user_id')->constrained('users');
            $table->index('user_id');
            $table->string('format')->nullable();
            $table->string('resume');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resume_templates');
    }
}
