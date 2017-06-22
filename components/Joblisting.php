<?php namespace Adil\SmartJob\Components;

use Cms\Classes\ComponentBase;
use Adil\SmartJob\Models\Job as SmartJobs;

class Joblisting extends ComponentBase
{
    /**
     * @var Adil\SmartJob\Models\Job The smartjob model used for display.
     */
    public $jobs;

    public function componentDetails()
    {
        return [
            'name'        => 'adil.smartjob::lang.joblisting.name',
            'description' => 'adil.smartjob::lang.joblisting.description'
        ];
    }

    public function defineProperties()
    {
        return [
                'jobsPerPage' => [
                'title'             => 'adil.smartjob::lang.joblisting.jobs_per_page',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'adil.smartjob::lang.joblisting.jobs_per_page_validation',
                'default'           => '5',
            ],
        ];
    }

    public function onRun()
    {
        $this->jobs = $this->getJobs();
    }

    protected function getJobs()
    {
        $perPage = $this->property('jobsPerPage');

        $jobs = new SmartJobs;
        $jobs = $jobs->isPublished()->orderby('title', 'asc')->paginate($perPage);

        return $jobs;
    }

}
