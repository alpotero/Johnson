<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pid');
            $table->string('source_type', 250)->nullable();
            $table->string('blog_id', 250)->nullable();
            $table->string('title', 250)->nullable();
            $table->mediumText('summary')->nullable();
            $table->string('author', 250)->nullable();
            $table->datetime('published_date')->nullable();
            $table->mediumText('link')->nullable();
            $table->string('rss_source', 250)->nullable();
            $table->datetime('date_created')->nullable();
            $table->string('duplicate_to', 250)->nullable();
            $table->string('hidden', 1)->nullable();
            $table->string('testing_status', 15)->nullable();
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
        Schema::dropIfExists('tbl_blogs');
    }
}
