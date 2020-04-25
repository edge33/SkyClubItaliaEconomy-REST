<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPassowdResetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('password_resets');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->$table->string('email', 191)->unique();
            $table->$table->string('token', 191);
            $table->$table->timestamp('created_at');
        });
    }
}
