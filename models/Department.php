<?php namespace Adil\Smartjob\Models;

use Model;

/**
 * Department Model
 */
class Department extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'adil_smartjob_departments';

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

    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
