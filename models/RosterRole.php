<?php namespace Adil\Smartjob\Models;

use Model;

/**
 * RosterRole Model
 */
class RosterRole extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'adil_smartjob_roster_roles';

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
        'rostersubroles' => ['Adil\Smartjob\Models\RosterSubRole', 'key' => 'roster_role_id', 'otherkey' => 'id']
    ];
    public $belongsTo = [];
    public $belongsToMany = [];
}
