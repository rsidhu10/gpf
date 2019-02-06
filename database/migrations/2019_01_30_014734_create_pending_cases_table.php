<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendingCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zone_id',3);
            $table->string('circle_id',3);
            $table->string('division_id',5);
            $table->string('letter_no',10);
            $table->date('letter_dt');
            $table->string('diary_no',10);
            $table->date('diary_dt');
            $table->string('category_id',2);
            $table->string('gpf_number',6);
            $table->string('empcode',6);
            $table->string('Name',35);
            $table->string('designation_id',3);
            $table->string('casetype_id',2);
            $table->date('retirement_dt');
            $table->string('relates_to',3);
            $table->string('status',2)->default('0');
            $table->string('approved_by',2)->default('11');
            $table->string('approval_no',10)->nullable();
            $table->date('approval_dt')->nullable();
            $table->float('approved_amt', 11,2)->nullable();
            $table->string('certificate',3)->default('No');
            $table->string('certificate_no', 11)->nullable();
            $table->date('certificate_dt')->nullable();
            $table->string('financial_year',9);
            $table->string('flag',1)->default(0);
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
        Schema::dropIfExists('pending_cases');
    }
}
