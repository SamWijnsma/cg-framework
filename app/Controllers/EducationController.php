<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\View;
use App\Models\EducationModel;
use App\Models\RoleModel;
use App\Models\UserModel;

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

        $userId = Helper::getUserIdFromSession();
        
        $user = UserModel::load()->get($userId);
        
        
    if($userId == $education -> user_id)
    {
        return View::render('educations/edit.view', [
            'action'    => '/education/' . $educationId . '/update',
            'education' => $education,
            'roles'     => RoleModel::load()->all(),
            'method'    => 'POST',
            'user'      => $user,
        ]);
    }
    else {
    return View::render('errors/403.view', [
        'message' => 'Blijf van andermans info af'
    ]);
}
    }

public function update()
    {

        $educationId = Helper::getIdFromUrl('education');
        
        $education = $_POST;

        $education['updated_by'] = Helper::getUserIdFromSession();
        $education['updated'] = date('Y-m-d H:i:s');

        EducationModel::load()->update($education, $educationId);
    }

public function create()
    {   
        return View::render('educations/create.view', [
            'method'    => 'POST',
            'action'    => '/education/store',
            'roles'     => RoleModel::load()->all(),
        ]);
    }

public function store()
    {
    
        $addeducation = $_POST;

        
        $addeducation['created_by'] = Helper::getUserIdFromSession();
        $addeducation['created'] = date('Y-m-d H:i:s');
        $addeducation['user_id'] = Helper::getUserIdFromSession();
        
        EducationModel::load()->store($addeducation);
    }

    public function destroy()
    {
        $destroyId = Helper::getIdFromUrl('education');
        $userId = Helper::getUserIdFromSession();
        $education = EducationModel::load()->get($destroyId);
        dd($destroyId);
        dd($education);
        
        EducationModel::load()->destroy($destroyId);
    }

}

