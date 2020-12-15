<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_themes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->index('name');
            $table->text('icon_original');
            $table->text('icon_origin_wordmark')->nullable();
            $table->text('icon_plain')->nullable();
            $table->text('icon_plain_wordmark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_themes');
    }
}
