<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\View;
use App\Models\SkillModel;
use App\Models\RoleModel;
use App\Models\UserModel;

class SkillController extends Controller 
{
    public function index()
    {
        $userId = Helper::getUserIdFromSession();

        $skills = SkillModel::load()->userSkills($userId);

        return View::render('skills/index.view', [
            'skills'    => $skills
        ]);
    } 


public function edit()
    {
        $skillId = Helper::getIdFromUrl('skill');
        

        $skill = SkillModel::load()->get($skillId);

        return View::render('skills/edit.view', [
            'action'    => '/skill/' . $skillId . '/update',
            'skill' => $skill,
            'method'    => 'POST',
            
        ]);
    }

public function update()
    {

        $skillId = Helper::getIdFromUrl('skill');
        
        $skill = $_POST;

        $skill['updated_by'] = Helper::getUserIdFromSession();
        $skill['updated'] = date('Y-m-d H:i:s');

        SkillModel::load()->update($skill, $skillId);

        header("Location: /me");
        
    }

public function create()
    {   
        return View::render('skills/create.view', [
            'method'    => 'POST',
            'action'    => '/skill/store',
            'roles'     => RoleModel::load()->all(),
        ]);
    }

public function store()
    {
    
        $addSkill = $_POST;

        
        $addSkill['created_by'] = Helper::getUserIdFromSession();
        $addSkill['created'] = date('Y-m-d H:i:s');
        $addSkill['user_id'] = Helper::getUserIdFromSession();
        
        skillModel::load()->store($addSkill);

        header("Location: /me");
    }

public function destroy()
    {
        $destroyId = Helper::getIdFromUrl('skill');
        SkillModel::load()->destroy($destroyId);
    }
    

}