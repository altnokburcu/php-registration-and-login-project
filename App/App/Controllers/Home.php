<?php

namespace App\Controllers;

use App\Auth;
use App\Flash;
use \Core\View;
use App\Mail;

/**
 * Home controller
 *
 * PHP version 5.4
 */
class Home extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        //echo " (after)";
    }

    /**
     * Show the index page
     *
     * @return void
     * @throws \Exception
     */
    public function indexAction()
    {
        View::render('Home/index.php', [
            'user' => Auth::getUser()
        ]);
    }
}
