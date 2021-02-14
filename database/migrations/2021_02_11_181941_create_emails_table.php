<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pid')->nullable();
            $table->string('email_address')->nullable();
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
        Schema::dropIfExists('emails');
    }
}
