<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePeopleTableToStudentsTable extends Migration
{
    public function up()
    {
        Schema::rename('people', 'students');
    }

    public function down()
    {
        Schema::rename('students', 'people');
    }
}
