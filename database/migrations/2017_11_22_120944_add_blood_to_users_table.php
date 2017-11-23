<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBloodToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('blood_type')->nullable();
            $table->string('blood_rhesus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'blood_type')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('blood_type');
            });
        }

        if (Schema::hasColumn('users', 'blood_rhesus')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('blood_rhesus');
            });
        }
    }
}
