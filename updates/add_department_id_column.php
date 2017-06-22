<?php namespace Adil\Smartjob\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddDepartmentIdColumn extends Migration
{
    public function up()
    {
        Schema::table('adil_smartjob_jobs', function($table) {            
            $table->integer('department_id')->after('department')->nullable();
        });
    }

    public function down()
    {
        Schema::table('adil_smartjob_jobs', function ($table) {
            $table->dropColumn('department_id');
        });        
    }
}
