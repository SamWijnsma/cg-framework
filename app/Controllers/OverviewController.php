<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\View;
use App\Models\JobModel;
use App\Models\EducationModel;
use App\Models\SkillModel;
use App\Models\HobbieModel;



class overviewController extends Controller 
{
    public function index()
    {
        $userId = Helper::getUserIdFromSession();

        $jobs = JobModel::load()->userJobs($userId);
        $educations = EducationModel::load()->userEducations($userId);
        $skills = SkillModel::load()->userSkills($userId);
        $hobbies = HobbieModel::load()->userHobbies($userId);

        return View::render('overview/index.view', [
            'jobs'          => $jobs,
            'educations'    => $educations,
            'skills'        => $skills,
            'hobbies'       => $hobbies,
        ]);
    }}