<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function($table){
            $table->boolean('is_admin')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
