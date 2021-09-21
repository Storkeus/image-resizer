<?php

namespace Page\App\Controller;

class Home extends \Page\App\Core\Controller
{

    public function index($isPage = false)
    {

        if ($isPage) {
            http_response_code(404);
            exit();
        }


        $this->view('home');
    }
}
