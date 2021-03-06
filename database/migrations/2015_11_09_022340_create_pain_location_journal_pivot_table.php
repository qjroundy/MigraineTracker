<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePainLocationJournalPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_pain_locations', function (Blueprint $table) {
            $table->integer('journal_id')->unsigned()->index();
            $table->integer('pain_locations_id')->unsigned()->index();
            
            $table->primary(['journal_id', 'pain_locations_id']);
        
            // Foreign Keys
            $table->foreign('pain_locations_id')->references('id')->on('pain_locations');
            $table->foreign('journal_id')->references('id')->on('journals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('journal_pain_locations');
    }
}
