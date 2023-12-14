<?php

namespace App\Controllers;

use App\Auth;
use App\Flash;
use \Core\View;

/**
 * Profile controller
 *
 * PHP version 7.0
 */
class Profile extends Authenticated
{
    //authenticated dan extend ettik çünkü requireLogin() metodunu kullanmak için, şuanda login syafasına redirect ediyor


    protected function before()
    {
        parent::before();
        $this->user = Auth::getUser();
    }

    public function showAction()
    {
        View::render('Profile/show.php', [
            'user'=> $this->user
        ]);
    }
    public function editAction(){
        View::render('Profile/edit.php', [
                'user'=> $this->user

            ]
        );
    }

    public function updateAction(){

        {

            if ($this->user->updateProfile($_POST)) {

                Flash::addMessage('Changes saved');

                $this->redirect('/profile/show');

            } else {

                View::render('Profile/edit.php', [
                    'user'=> $this->user
                ]);

            }

    }}
}
