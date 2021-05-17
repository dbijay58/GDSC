<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table -> string('phone', 15)->nullable()->change();
            $table-> string('st_address', 100);
            $table ->string('suburb',30);
            $table-> string('state', 5);
            $table ->integer('post_code');
            $table-> integer('driving_level_initial');
            $table-> integer('driving_level_now');
            $table-> integer('lesson_package');
            $table -> date('l_licence_date');
            $table ->date('dob');
            $table -> boolean('intl_licence');
            $table -> string('remarks');
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
            //
        });
    }
}
