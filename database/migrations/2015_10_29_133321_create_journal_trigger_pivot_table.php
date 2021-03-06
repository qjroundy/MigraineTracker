<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalTriggerPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_trigger', function (Blueprint $table) {
            $table->integer('journal_id')->unsigned()->index();
            $table->integer('trigger_id')->unsigned()->index();
            
            $table->primary(['journal_id', 'trigger_id']);
        
            // Foreign Keys
            $table->foreign('trigger_id')->references('id')->on('triggers')->onDelete('cascade');
            $table->foreign('journal_id')->references('id')->on('journals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('journal_trigger');
    }
}
