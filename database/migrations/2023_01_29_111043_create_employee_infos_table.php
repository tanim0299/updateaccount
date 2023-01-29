<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_infos', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id',200)->nullable();
            $table->string('name',100)->nullable();
            $table->string('fathers_name',100)->nullable();
            $table->string('mothers_name',100)->nullable();
            $table->string('phone_number',20)->nullable();
            $table->string('phone_number2',20)->nullable();
            $table->string('email',100)->nullable();
            $table->string('designation',200)->nullable();
            $table->string('gender',50)->nullable();
            $table->string('religion',50)->nullable();
            $table->longText('present_address')->nullable();
            $table->longText('permenant_address')->nullable();
            $table->date('joining_date')->nullable();
            $table->integer('status')->nullable();
            $table->string('image',100)->nullable();
            $table->string('nid',100)->nullable();
            $table->string('admin_id',100)->nullable();
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
        Schema::dropIfExists('employee_infos');
    }
}
