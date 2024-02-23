<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueIndexToIdnoColumnInStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unique('IDno');
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropUnique('students_idno_unique');
        });
    }
}
