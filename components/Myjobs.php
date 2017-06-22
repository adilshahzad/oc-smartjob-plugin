<?php namespace Adil\Smartjob\Components;

use Cms\Classes\ComponentBase;
use Adil\SmartJob\Models\Job as SmartJobs;
use Adil\Smartjob\Models\UserJob;
use Auth;
use DB;

class Myjobs extends ComponentBase
{
    /**
     * @var Adil\SmartJob\Models\Job The smartjob model used for display.
     */
    public $userJobs;

    public function componentDetails()
    {
        return [
            'name'        => 'adil.smartjob::lang.myjoblisting.name',
            'description' => 'adil.smartjob::lang.myjoblisting.description'
        ];
    }

    public function defineProperties()
    {
        return [
                'jobsPerPage' => [
                'title'             => 'adil.smartjob::lang.myjoblisting.jobs_per_page',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'adil.smartjob::lang.myjoblisting.jobs_per_page_validation',
                'default'           => '5',
            ],
        ];
    }

    public function onRun()
    {
        $this->userJobs = $this->getJobs();
    }

    protected function getJobs()
    {
        $perPage = $this->property('jobsPerPage');
        $user = Auth::getUser();
        if($user)
        {
            // $userJobs = new SmartJobs;
            // $userJobs = $userJobs->isPublished()->with('userJobs')->where('user_id', $user->id)->orderby('title', 'asc')->paginate($perPage);

            // $userJobs = new UserJob;
            // $userJobs = $userJobs->where('user_id', $user->id)->paginate($perPage);
            $userJobs = DB::select('SELECT job.*
                                    FROM adil_smartjob_jobs AS job
                                    INNER JOIN adil_smartjob_user_jobs AS myjob ON myjob.job_id = job.id
                                    WHERE myjob.user_id = ?', [$user->id]);
            return $userJobs;
        }
    }
}