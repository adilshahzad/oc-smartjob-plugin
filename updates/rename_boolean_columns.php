<?php namespace Adil\Smartjob\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class DeleteDepartmentColumn extends Migration
{
    public function up()
    {
        Schema::table('adil_smartjob_jobs', function ($table) {
            $table->renameColumn('position_filled', 'is_filled');
            $table->renameColumn('job_status', 'is_expired');
        });
    }
}


