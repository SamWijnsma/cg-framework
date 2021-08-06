<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\View;
use App\Models\EducationModel;
use App\Models\RoleModel;

class EducationController extends Controller 
{
    public function index()
    {
        $userId = Helper::getUserIdFromSession();

        $educations = EducationModel::load()->userEducations($userId);

        return View::render('educations/index.view', [
            'educations'    => $educations
        ]);
    } 

public function edit()
    {
      $educationId = Helper::getIdFromUrl('education');
      
      $education = EducationModel::load()->get($educationId);
      
      
      return View::render('educations/edit.view', [
          'education' => $education,
          'action'    => '/education/' . $educationId . '/update',
          'roles'     => RoleModel::load()->all(),
          'method'    => 'POST'

      ]);
    }

}

