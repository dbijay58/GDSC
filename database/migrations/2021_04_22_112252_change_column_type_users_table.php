<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnTypeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            //
            $table -> string('phone', 15)->nullable()->change();
            $table-> string('st_address', 100)->nullable()->change();
            $table ->string('suburb',30)->nullable()->change();
            $table-> string('state', 5)->nullable()->change();
            $table ->integer('post_code')->nullable()->change();
            $table-> integer('driving_level_initial')->nullable()->change();
            $table-> integer('driving_level_now')->nullable()->change();
            $table-> integer('lesson_package')->nullable()->change();
            $table -> date('l_licence_date')->nullable()->change();
            $table ->date('dob')->nullable()->change();
            $table -> boolean('intl_licence')->nullable()->change();
            $table -> string('remarks')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
