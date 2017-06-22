<?php namespace Adil\Smartjob;

use Backend;
use System\Classes\PluginBase;
use Adil\SmartJob\Models\Job as SmartJobs;

/**
 * smartjob Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'adil.smartjob::lang.plugin.name',
            'description' => 'adil.smartjob::lang.plugin.description',
            'author'      => 'adil',
            'icon'        => 'icon-thumbs-o-up'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Adil\Smartjob\Components\Joblisting' => 'Jobs',
            'Adil\Smartjob\Components\Jobdetail' => 'JobDetail',
            'Adil\Smartjob\Components\Myjobs' => 'UserJobs',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'adil.smartjob.access_departments' => [
                'tab' => 'adil.smartjob::lang.plugin.name',
                'label' => 'Manage Departments'
            ],
            'adil.smartjob.access_jobs' => [
                'tab' => 'adil.smartjob::lang.plugin.name',
                'label' => 'Manage Jobs'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'smartjob' => [
                'label'       => 'adil.smartjob::lang.plugin.name',
                'url'         => Backend::url('adil/smartjob/jobs'),
                'icon'        => 'icon-briefcase',
                'permissions' => ['adil.smartjob.*'],
                'order'       => 500,
            'sideMenu' => [

                    'jobs' => [
                        'label'       => 'Vacancies',
                        'icon'        => 'icon-briefcase',
                        'url'         => Backend::url('adil/smartjob/jobs'),
                        'permissions' => ['adil.smartjob.access_jobs']
                    ],
                    'departments' => [
                        'label'       => 'Departments',
                        'icon'        => 'icon-list-ol',
                        'url'         => Backend::url('adil/smartjob/departments'),
                        'permissions' => ['adil.smartjob.access_departments']
                    ],
                ],                
            ],
             
        ];
    }

    /**
     * 
     * Expire the jobs as soon as the expiry date reached.
     * 
     */    

    public function registerSchedule($schedule)
    {
        $schedule->call(function () {
            // \Db::table('recent_users')->delete();
            SmartJobs::expire(0);
        })->everyMinute();
    }    
}
