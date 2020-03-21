<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrizeBondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prize_bonds', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedInteger('denomination_id');
            $table->decimal('bond',6,0);
            $table->decimal('position',1,0);
            $table->date('draw_date');
            $table->string('draw_date_raw_imported');
            $table->string('held_at_location');
            $table->integer('draw_number');

            $table->timestamps();
            $table->softDeletes();

            //Foreign
            $table->foreign('denomination_id')->references('id')->on('denominations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prize_bonds');
    }
}
