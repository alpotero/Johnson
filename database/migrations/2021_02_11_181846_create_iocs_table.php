<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iocs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('pid')->nullable();
            $table->string('ioc_type', 10)->nullable();
            $table->string('ioc')->nullable()->comment('SHA1, SHA256, MD5, Email, Domain, IP, URL');
            $table->bigInteger('page')->nullable();
            $table->string('related_blog_id')->nullable()->comment('This value is connected to blog_id in table Blogs');
            $table->string('last_modified')->nullable();

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
        Schema::dropIfExists('iocs');
    }
}
