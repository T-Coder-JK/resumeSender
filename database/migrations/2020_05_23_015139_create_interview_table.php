<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->timestamp('time')->nullable();
            $table->string('address')->nullable();
            $table->integer('inter_round')->default(1);
            $table->foreignId('application_id')->references('id')->on('applications');
            $table->longText('comments');
            $table->timestamps();
            $table->softDeletes('deleted_at',0);
            $table->index('application_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interviews');
    }
}
