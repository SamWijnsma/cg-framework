<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\View;
use App\Models\JobModel;
use App\Models\RoleModel;

class JobController extends Controller 
{
    public function index()
    {
        $userId = Helper::getUserIdFromSession();

        $jobs = JobModel::load()->userJobs($userId);

        return View::render('jobs/index.view', [
            'jobs'    => $jobs
        ]);
    } 


public function edit()
{
        $jobId = Helper::getIdFromUrl('job');
        

        $job = JobModel::load()->get($jobId);

        $userId = Helper::getUserIdFromSession();
    
    if
    ($userId == $job -> user_id)
    {
        return View::render('jobs/edit.view', [
            'action'    => '/job/' . $jobId . '/update',
            'job' => $job,
            'method'    => 'POST',
            
        ]);
    }
    else 
    {
        return View::render('errors/403.view', [
            'message' => 'Blijf van mijn baan af'
        ]);
        
    }

}

public function update()
{

    $jobId = Helper::getIdFromUrl('job');
        
    $job = $_POST;

    $job['updated_by'] = Helper::getUserIdFromSession();
    $job['updated'] = date('Y-m-d H:i:s');

    JobModel::load()->update($job, $jobId);
    
    header("Location: /me");

}

public function create()
    {   
        return View::render('jobs/create.view', [
            'method'    => 'POST',
            'action'    => '/job/store',
            'roles'     => RoleModel::load()->all(),
        ]);
    }

public function store()
    {
    
        $addJob = $_POST;

        
        $addJob['created_by'] = Helper::getUserIdFromSession();
        $addJob['created'] = date('Y-m-d H:i:s');
        $addJob['user_id'] = Helper::getUserIdFromSession();
        
        jobModel::load()->store($addJob);

        header("Location: /me");
    }

public function destroy()
{
        $destroyId = Helper::getIdFromUrl('job');
        $userId = Helper::getUserIdFromSession();
        $jobId = Helper::getIdFromUrl('job');
        $job = JobModel::load()->get($jobId);
       
    if
    ($userId == $job -> user_id)
        {
        JobModel::load()->destroy($destroyId);
        }
    else 
    {
        return View::render('errors/403.view', [
                'message' => 'Do not take ma job' 
    ]);        
    }
}
    

}