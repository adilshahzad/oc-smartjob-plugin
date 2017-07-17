<?php namespace Adil\Smartjob\Models;

use Model;

/**
 * job Model
 */
class Job extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'adil_smartjob_jobs';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [        
        'userjobs_count' => ['Adil\Smartjob\Models\UserJob', 'count' => true],
        'userJobs' => ['Adil\Smartjob\Models\UserJob'],
    ];
    public $belongsTo = [
        'department' => ['Adil\Smartjob\Models\Department'],
        'sub_role' => ['Adil\Smartjob\Models\RosterSubRole'],
    ];

    public function getRosterRoleIdOptions()
    {
        return \Adil\Smartjob\Models\RosterRole::orderBy('title', 'asc')->lists('title', 'id');
    }

    public function getSubRoleIdOptions($value, $data)
    {
        return \Adil\Smartjob\Models\RosterSubRole::where('roster_role_id', '=', $data->_roster_role_id)
        ->orderBy('sub_role_title', 'asc')
        ->lists('sub_role_title', 'id');
    }
    //
    // Scopes
    //

    public function scopeIsPublished($query)
    {
        return $query
            ->where('is_expired', 1) // 1 = Active
            // ->where('position_filled', 0)
        ;
    }

    /**
     * Change job status to mark as Active=1 or Expire=0 i.e show and hide on the public page.
     * @return void
     */
    public function expire($status)
    {
        $job = Self::find($this->id);
        $job->is_expired = $status;
        $job->save();
    }

    /**
     * Change job filled field to mark as Filled=1 or Filled=0 i.e the position is filled or still vacant.
     * @return void
     */
    public function filled($status)
    {
        $job = Self::find($this->id);
        $job->is_filled = $status;
        $job->save();
    }
}
