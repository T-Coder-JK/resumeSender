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
            $table->timestamp('apply_at')->nullable();
            $table->timestamps();
            $table->integer('email_id')->nullable();
            $table->string('job_ad')->nullable();
            $table->integer('company_id');
            $table->string('job_title');
            $table->boolean('interview')->default(0);
            $table->boolean('got_reply')->default(0);
            $table->string('job_type');
            $table->string('salary');
            $table->longText('additional_description')->nullable();
            $table->boolean('has_applied')->default(0);
            $table->integer('personal_rank')->nullable();
            $table->integer('possibility')->nullable();
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
