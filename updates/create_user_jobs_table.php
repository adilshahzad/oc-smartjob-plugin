<?php namespace Adil\SmartJob\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateUserJobsTable extends Migration
{
    public function up()
    {
        Schema::create('adil_smartjob_user_jobs', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('job_id')->unsigned()->index()->nullable();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->primary(['job_id', 'user_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('adil_smartjob_user_jobs');
    }
}
