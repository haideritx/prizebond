<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserPrizebondAddCompositeUniqueKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_prize_bonds', function (Blueprint $table) {
            $table->unique(["denomination_id", "user_id", "bond"], 'denomination_user_bond_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_prize_bonds', function (Blueprint $table) {
            $table->dropUnique('denomination_user_bond_unique');
        });
    }
}
