<?php namespace Adil\Smartjob\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('adil_smartjob_jobs', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('location')->nullable();
            $table->string('job_type')->nullable();
            $table->string('department')->nullable();
            $table->text('description')->nullable();
            $table->string('application_email')->nullable();
            $table->date('job_expiry')->nullable();
            $table->integer('min_salary')->nullable();
            $table->integer('max_salary')->nullable();
            $table->string('qualification')->nullable();
            $table->string('experience')->nullable();
            $table->string('gender')->nullable();
            $table->string('total_number_of_post')->nullable();
            $table->boolean('position_filled')->default(0);
            $table->boolean('job_status')->default(0);
            $table->integer('user_id')->nullable();            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('adil_smartjob_jobs');
    }
}