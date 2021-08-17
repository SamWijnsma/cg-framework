<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\View;
use App\Models\HobbieModel;
use App\Models\RoleModel;

class HobbieController extends Controller 
{
    public function index()
    {
        $userId = Helper::getUserIdFromSession();

        $hobbies = HobbieModel::load()->userHobbies($userId);

        return View::render('hobbies/index.view', [
            'hobbies'    => $hobbies
        ]);
    } 


public function edit()
{
        $hobbieId = Helper::getIdFromUrl('hobbie');
        

        $hobbie = hobbieModel::load()->get($hobbieId);

        $userId = Helper::getUserIdFromSession();
    
    if
    ($userId == $hobbie -> user_id)
    {
        return View::render('hobbies/edit.view', [
            'action'    => '/hobbie/' . $hobbieId . '/update',
            'hobbie' => $hobbie,
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

    $hobbieId = Helper::getIdFromUrl('hobbie');
        
    $hobbie = $_POST;

    $hobbie['updated_by'] = Helper::getUserIdFromSession();
    $hobbie['updated'] = date('Y-m-d H:i:s');

    hobbieModel::load()->update($hobbie, $hobbieId);
    
    header("Location: /me");

}

public function create()
    {   
        return View::render('hobbies/create.view', [
            'method'    => 'POST',
            'action'    => '/hobbie/store',
            'roles'     => RoleModel::load()->all(),
        ]);
    }

public function store()
    {
    
        $addHobbie = $_POST;

        
        $addHobbie['created_by'] = Helper::getUserIdFromSession();
        $addHobbie['created'] = date('Y-m-d H:i:s');
        $addHobbie['user_id'] = Helper::getUserIdFromSession();
        
        hobbieModel::load()->store($addHobbie);

        header("Location: /me");
    }

public function destroy()
{
        $destroyId = Helper::getIdFromUrl('hobbie');
        $userId = Helper::getUserIdFromSession();
        $hobbieId = Helper::getIdFromUrl('hobbie');
        $hobbie = HobbieModel::load()->get($hobbieId);
       
    if
    ($userId == $hobbie -> user_id)
        {
        HobbieModel::load()->destroy($destroyId);
        }
    else 
    {
        return View::render('errors/403.view', [
                'message' => 'Dat is mijn hobbie vriend' 
    ]);        
    }
}
    

}