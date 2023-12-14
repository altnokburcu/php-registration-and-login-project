<?php

namespace App\Controllers;

use App\Models\User;
use \Core\View;

/**
 * Password controller
 *
 * PHP version 7.0
 */
class Password extends \Core\Controller
{
    /**
     * Show the forgotten password page
     *
     * @return void
     */
    public function forgotAction()
    {
        View::render('Password/forgot.php');
    }
    /**
     * Send the password reset link to the supplied email
     *
     * @return void
     */
    public function requestResetAction()
    {
        (new \App\Models\User)->sendPasswordReset($_POST['email']);

        View::render('Password/reset_requested.html');
    }
    /**
     * Show the reset password form
     *
     * @return void
     */
    public function resetAction()
    {
        $token = $this->route_params['token'];

        $user = $this->getUserOrExit($token);

        View::render('Password/reset.php', [
            'token'=> $token
        ]);
    }
    public function resetPasswordAction(){


        $token = $_POST['token'];

        echo $token;
        $user = $this->getUserOrExit($token);

        if ($user->resetPassword($_POST['password'])) {

            View::render('Password/reset_success.html');

        } else {

            View::render('Password/reset.php', [
                'token' => $token,
                'user' => $user
            ]);
        }

}
    protected function getUserOrExit($token)
    {
        $user = User::findByPasswordReset($token);

        if ($user) {

            return $user;

        } else {

            View::render('Password/token_expired.html');
            exit;

        }
    }

}
