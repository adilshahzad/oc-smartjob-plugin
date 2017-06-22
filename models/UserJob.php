<?php namespace Adil\SmartJob\Models;

use Model;

/**
 * UserJob Model
 */
class UserJob extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'adil_smartjob_user_jobs';
    
    /*
     * Validation
     */
    public $rules = [
        'user_id' => 'required',
        'job_id' => 'required',
    ];
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
        'smartjobs' => 'Adil\Smartjob\Models\Job'
    ];
    public $belongsTo = [
        // 'smartjobs' => 'Adil\Smartjob\Models\Job'
    ];
    public $belongsToMany = [
        'users' => ['Rainlab\User\Models\User'],
        // 'smartjobs' => ['Adil\Smartjob\Models\Job', "table" => 'adil_smartjob_jobs', 'key'=>'id', 'otherkey'=>'job_id']
        // 'smartjobs' => ['Adil\Smartjob\Models\Job'],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}