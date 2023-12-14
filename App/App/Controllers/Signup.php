<?php

namespace App\Controllers;

use App\Models\User;
use \Core\View;

class Signup extends \Core\Controller
{

    public function newAction(){
        View::render('Signup/new.php');
    }
    public function createAction(){

        $user = new User($_POST);
        if ($user->save()) {

            $user->sendActivationEmail();

            $this->redirect('/signup/success');
        } else {

            View::render('Signup/new.php', ['user' => $user]);

        }
    }
    public function successAction()
    {
        View::render('Signup/success.html');
    }
    public function activateAction()
    {
        User::activate($this->route_params['token']);

        $this->redirect('/signup/activated');
    }

    /**
     * Show the activation success page
     *
     * @return void
     */
    public function activatedAction()
    {
        View::render('Signup/activated.html');
    }
}