<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pid');
            $table->string('source_type', 250)->default('url')->nullable()->comment('URL, File');
            $table->string('blog_id', 250)->nullable()->comment('This contains generated hash that serves as unique id of each scraped blogs.');
            $table->string('title', 250)->nullable();
            $table->mediumText('summary')->nullable();
            $table->string('author', 250)->nullable();
            $table->datetime('published_date')->nullable();
            $table->mediumText('link')->nullable();
            $table->string('rss_source', 250)->nullable();
            $table->datetime('date_created')->nullable()->comment('UTC 0 timezone');
            $table->string('duplicate_to', 250)->nullable()->comment('contains blog_ids that are related. Delimete for multiple blog_id is comma ,');
            $table->string('hidden', 1)->default('0')->nullable()->comment('0 = Not hidden, 1 = Hidden');
            $table->string('testing_status', 15)->default('None')->nullable()->comment('None, Submitted, Under Testing, Under Review, For Publishing');
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
        Schema::dropIfExists('blogs');
    }
}
