<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class ModifyTrackIdColumnInStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('track_id')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // In the down method, we don't need to revert the default value,
        // as setting the default value to NULL doesn't have a specific reversal.
        // We only need to change the column definition back to its original state.
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('track_id')->nullable(false)->change();
        });
    }
}
