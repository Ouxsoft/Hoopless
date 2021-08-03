<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StylesheetController
{
    /**
     * @Route("/assets/css/{file}", name="app_lucky_number")
     */
    public function get() : Response
    {

    }
}