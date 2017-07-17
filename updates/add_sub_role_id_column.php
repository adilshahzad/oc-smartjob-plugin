<?php namespace Adil\Smartjob\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddSubRoleIdColumn extends Migration
{
    public function up()
    {
        Schema::table('adil_smartjob_jobs', function($table) {            
            $table->integer('sub_role_id')->after('job_type')->nullable();
        });
    }

    public function down()
    {
        Schema::table('adil_smartjob_jobs', function ($table) {
            $table->dropColumn('sub_role_id');
        });        
    }
}
