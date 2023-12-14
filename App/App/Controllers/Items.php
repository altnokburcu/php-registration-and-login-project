<?php

namespace App\Controllers;

use \Core\View;

/**
 * Items controller (example)
 *
 * PHP version 7.0
 */
class Items extends Authenticated
{

    /**
     * Items index
     *
     * @return void
     */
    public function indexAction()
    {
        $this->requireLogin();
        View::render('Items/index.html');
    }
    public function newAction(){
        $this->requireLogin();
        echo "new action";
    }

    public function showAction(){
        $this->requireLogin();
        echo "show action";
    }
}
