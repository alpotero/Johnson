<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pid')->nullable();
            $table->mediumText('url')->nullable();
            $table->string('rating')->default('Untested')->nullable()->comment('Dangerous, Safe, Untested');
            $table->string('category')->default('Unknown')->nullable()->comment('Example: Coinminer, Disease Vector etc.');
            $table->mediumText('notes')->nullable()->comment('Engr/User supplied');
            $table->dateTime('last_query')->nullable();
            $table->dateTime('first_seen')->nullable();
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
        Schema::dropIfExists('urls');
    }
}
