<?php namespace Adil\Smartjob\Components;

use Cms\Classes\ComponentBase;
use Adil\SmartJob\Models\Job as SmartJobs;
use Flash;
use Request;
use Redirect;
use Auth;
use Validator;
use ValidationException;
use Adil\Smartjob\Models\UserJob;

class Jobdetail extends ComponentBase
{
    public $jobDetail;

    public function componentDetails()
    {
        return [
            'name'        => 'adil.smartjob::lang.jobdetail.component_name',
            'description' => 'adil.smartjob::lang.jobdetail.component_detail'
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'title'       => 'adil.smartjob::lang.jobdetail.job_slug',
                'description' => 'adil.smartjob::lang.jobdetail.job_slug_description',
                'default'     => '{{ :slug }}',
                'type'        => 'string'
            ],
            'id' => [
                'title'       => 'adil.smartjob::lang.jobdetail.job_id',
                'description' => 'adil.smartjob::lang.jobdetail.job_id_description',
                'type'        => 'string'
            ],
        ];
    }

    public function onRun()
    {
        $this->jobDetail = $this->jobDetail();        
        // $this->page->description = "Posted in ".$this->jobDetail->department->department_name;
    }

    protected function jobDetail()
    {
        $slug = $this->property('slug');
        $id = $this->property('id');

        $job = new SmartJobs;

        $job = $job->where('slug', $slug)
                ->where('id', $id);
                

         $job = $job->isPublished()->firstOrFail();
        
        $this->page->title = $job->sub_role->roster_role->title;
        return $job;
    }

    public function onApplyforJob()
    {
        if($user = Auth::getUser())
        {
            $UserJob = new UserJob();
            $UserJob->user_id = $user->id;
            $UserJob->job_id = $this->property('id');
            
            if (!$UserJob->save()) {
                return Redirect::refresh()->withErrors("Error");
            }

            Flash::success('Successfully applied!');
            return Redirect::refresh();
        }
        else
        {
            Flash::warning('Please sign in to apply for this position!');
            return Redirect::refresh();
        }
    }
}