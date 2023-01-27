<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_menus', function (Blueprint $table) {
            $table->id();
            $table->string('sub_menu_id',200)->nullable();
            $table->integer('serial_no')->nullable();
            $table->bigInteger('main_menu_id')->unsigned();
            $table->foreign('main_menu_id')->references('id')->on('main_menus');
            $table->string('sub_menu_name',100)->nullable();
            $table->string('route',100)->nullable();
            $table->integer('status')->nullable();
            $table->string('admin_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_menus');
    }
}
