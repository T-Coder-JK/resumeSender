<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_replies', function (Blueprint $table) {
            $table->id();
            $table->timestamp('replied_at');
            $table->foreignId('application_id')->constrained('applications');
            $table->longText('replied_content');
            $table->softDeletes('deleted_at',0);
            $table->timestamps();
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
        Schema::dropIfExists('application_replies');
    }
}
