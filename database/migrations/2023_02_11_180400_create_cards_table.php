<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_myl_api')->unique();
            $table->integer('eid_myl_api')->unique();
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->integer('cost')->nullable();
            $table->integer('damage')->nullable();
            $table->text('ability')->nullable();
            $table->text('ability_html')->nullable();
            $table->string('slug_edition')->nullable();
            $table->integer('fk_type_card')->unsigned()->nullable();
            $table->foreign('fk_type_card')->references('id')->on('card_types');
            $table->integer('fk_race')->unsigned()->nullable();
            $table->foreign('fk_race')->references('id')->on('races');
            $table->integer('fk_raritie_card')->unsigned()->nullable();
            $table->foreign('fk_raritie_card')->references('id')->on('raritie_cards');
            // $table->string('name_edition');
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
        Schema::dropIfExists('cards');
    }
};
