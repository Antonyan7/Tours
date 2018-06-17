<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name')->nullable();
            $table->text('img')->nullable();
            $table->text('description')->nullable();
            $table->integer('age')->nullable();
            $table->text('availability')->nullable();
            $table->text('price')->nullable();
            $table->text('departure')->nullable();
            $table->text('departure_time')->nullable();
            $table->text('return_time')->nullable();
            $table->text('included')->nullable();
            $table->text('not_included')->nullable();
            $table->integer('category_id')->nullable();
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
        Schema::dropIfExists('tours');
    }
}
