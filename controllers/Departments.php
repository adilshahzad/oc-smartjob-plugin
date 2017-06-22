<?php namespace Adil\Smartjob\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Departments Back-end Controller
 */
class Departments extends Controller
{
    public $requiredPermissions = ['adil.smartjob.access_departments'];

    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Adil.Smartjob', 'smartjob', 'departments');
    }
}
