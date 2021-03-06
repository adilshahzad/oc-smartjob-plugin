<?php namespace Adil\Smartjob\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Roster Roles Back-end Controller
 */
class RosterRoles extends Controller
{
    public $requiredPermissions = ['adil.smartjob.access_roles'];

    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Adil.Smartjob', 'smartjob', 'rosterroles');
    }
}
