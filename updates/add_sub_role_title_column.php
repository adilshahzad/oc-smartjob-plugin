<?php namespace Adil\Smartjob\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddSubRoleTitleColumn extends Migration
{
    public function up()
    {
        Schema::table('adil_smartjob_roster_sub_roles', function($table) {            
            $table->string('sub_role_title')->after('roster_role_id')->index()->nullable();
        });
    }

    public function down()
    {
        Schema::table('adil_smartjob_roster_sub_roles', function ($table) {
            $table->dropColumn('sub_role_title');
        });        
    }
}
