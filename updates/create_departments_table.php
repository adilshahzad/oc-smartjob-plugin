<?php namespace Adil\Smartjob\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('adil_smartjob_departments', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('department_name')->unique()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('adil_smartjob_departments');
    }
}
