<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateEmployeesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string('id',6);
            $table->string('zone_id', 3);
            $table->string('circle_id', 3);
            $table->string('division_id', 5);
            $table->string('emp_name', 50);
            $table->string('emp_fname', 50);
            $table->string('gender', 10);
            $table->date('birth_date');
            $table->date('join_date');
            $table->string('designation_id', 5);
            $table->string('designation', 50);
            $table->string('currentoffice', 50);
            $table->string('present_state', 50);
            $table->string('permanent_state', 50);
            $table->string('emp_group', 15);
            $table->string('category', 15);
            $table->string('gpf_number', 10);
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
        Schema::dropIfExists('employees');
    }
}
