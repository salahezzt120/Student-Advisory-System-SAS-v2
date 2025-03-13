<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('AIU_ID')->nullable();
            $table->integer('gpa')->nullable();
            $table->string('stutes')->default('In progress');
            $table->string('problem')->nullable();
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
            $table->dropColumn('AIU_ID');
            $table->dropColumn('Cgpa');
            $table->dropColumn('stutes');
        });
    }
}