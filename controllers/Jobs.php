<?php namespace Adil\Smartjob\Controllers;

use Auth;
use Lang;
use Flash;
use BackendMenu;
use BackendAuth;
use System\Classes\SettingsManager;
use Backend\Classes\Controller;
use Adil\Smartjob\Models\Job as Smartjob;
/**
 * Jobs Back-end Controller
 */
class Jobs extends Controller
{
    public $requiredPermissions = ['adil.smartjob.access_jobs'];

    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Adil.Smartjob', 'smartjob', 'jobs');
    }
     /**
     * {@inheritDoc}
     */
    public function listInjectRowClass($record, $definition = null)
    {
        // 0 = Expired
        if ($record->is_expired == 0) {
            return 'negative strike';
        }
        else if ($record->is_expired == 1) {
            return 'positive';
        }


        if (!$record->is_activated) {
            return 'disabled';
        }
    }
    public function index()
    {
        $this->addJs('/plugins/adil/smartjob/assets/js/bulk-actions.js');

        $this->asExtension('ListController')->index();
    }

    /**
     * Perform bulk action on selected users
     */
    public function index_onBulkAction()
    {
        if (
            ($bulkAction = post('action')) &&
            ($checkedIds = post('checked')) &&
            is_array($checkedIds) &&
            count($checkedIds)
        ) {

            foreach ($checkedIds as $jobId) {
                if (!$job = Smartjob::find($jobId)) {
                    continue;
                }
                switch ($bulkAction) {
                    case 'delete':
                        $job->forceDelete();
                        break;

                    case 'activate':
                        $job->expire(1);
                        break;

                    case 'expire':
                        $job->expire(0);
                        break;

                    case 'filled':
                        $job->filled(1);
                        break;

                    case 'vacant':
                        $job->filled(0);
                        break;
                }
            }

            Flash::success(Lang::get('adil.smartjob::lang.job.'.$bulkAction.'_selected_success'));
        }
        else {
            Flash::error(Lang::get('adil.smartjob::lang.job.'.$bulkAction.'_selected_empty'));
        }

        return $this->listRefresh();
    }    

    /**
     * Force delete a job.
     */
    public function update_onDelete($recordId = null)
    {
        $model = $this->formFindModelObject($recordId);

        $model->forceDelete();

        Flash::success(Lang::get('backend::lang.form.delete_success'));

        if ($redirect = $this->makeRedirect('delete', $model)) {
            return $redirect;
        }
    }

}
