<?php

namespace Page\App\Controller;

class ErrorPage extends \Page\App\Core\Controller
{

    public function index($errorNumber)
    {

        $this->addData('number',$errorNumber);

        $this->view('error');
    }
}
