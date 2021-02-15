<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pid')->nullable();
            $table->string('hash_type')->nullable()->comment('SHA1, SHA256, MD5');
            $table->string('hash')->nullable();
            $table->string('ddan')->default('Untested')->nullable()->comment('Untested, Not Supported, ddan-detection');
            $table->string('vsapi')->default('Untested')->nullable()->comment('Untested, Not Supported, vsapi-detection');
            $table->string('pml')->default('Untested')->nullable()->comment('Untested, Not Supported, pml-detection');
            $table->string('bm')->default('Untested')->nullable()->comment('Untested, Not Supported, bm-detection');
            $table->mediumText('notes')->nullable()->comment('Engr/User supplied');
            $table->dateTime('last_query')->nullable();
            $table->dateTime('first_seen')->nullable();
            $table->string('download_available', 5)->default('No')->nullable()->comment('Yes or No');
            $table->string('created_by')->default('eyes_automation')->nullable();
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
        Schema::dropIfExists('files');
    }
}
