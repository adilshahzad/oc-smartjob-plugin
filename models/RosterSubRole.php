<?php namespace Adil\SmartJob\Models;

use Model;

/**
 * RosterSubRole Model
 */
class RosterSubRole extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'adil_smartjob_roster_sub_roles';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];
    
    /*
    * Validate input
    */
    public $rules = [
            'roster_role_id' => 'required',
            'sub_role_title' => 'required',
            ];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'roster_role' => ['Adil\Smartjob\Models\RosterRole'],
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
    
    public function getRosterRoleIdOptions()
    {
        return \Adil\Smartjob\Models\RosterRole::lists('title', 'id');
    }    
}
