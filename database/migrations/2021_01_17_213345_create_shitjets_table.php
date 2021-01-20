<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShitjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shitjets', function (Blueprint $table) {
            $table->id();
            $table->string('bar_kodi');
            $table->string('emri');
            $table->integer('sasia');
            $table->decimal('cmimi');
            $table->integer('b_id');
            $table->decimal('totali');
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
        Schema::dropIfExists('shitjets');
    }
}
