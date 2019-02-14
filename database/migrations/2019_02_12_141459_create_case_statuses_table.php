<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_statuses', function (Blueprint $table) {
            $table->string('id', 2);
            $table->string('Name', 30);
            $table->string('financial_year', 10);
            $table->string('month', 2);
            $table->string('year', 4);
            $table->string('case_total', 4)->default('0');
            $table->string('case_complete', 4)->default('0');
            $table->string('case_objection', 4)->default('0');
            $table->string('case_approved', 4)->default('0');
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_statuses');
    }
}
