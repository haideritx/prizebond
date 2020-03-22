<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableAddFirstMiddleLastNameColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            if (!Schema::hasColumns('users', ['first_name', 'middle_name', 'last_name'])) {
                $table->string('last_name')->after('id');
                $table->string('middle_name')->nullable()->after('id');
                $table->string('first_name')->after('id');
            }

            if(Schema::hasColumn('users','name')) {
                $table->dropColumn('name');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumns('users', ['first_name', 'middle_name', 'last_name'])) {
                $table->dropColumn('first_name');
                $table->dropColumn('middle_name');
                $table->dropColumn('last_name');
            }

            if(!Schema::hasColumn('users','name')) {
                $table->string('name');
            }
        });

    }
}
