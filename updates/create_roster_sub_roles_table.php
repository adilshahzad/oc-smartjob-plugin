<?php namespace Adil\SmartJob\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateRosterSubRolesTable extends Migration
{
    public function up()
    {
        Schema::create('adil_smartjob_roster_sub_roles', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('roster_role_id')->index()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('adil_smartjob_roster_sub_roles');
    }
}
