<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\ORM\EntityManager;

class AuthController
{
    /**
     * @Route("/auth/login", priority=5, name="authenicate", methods={"POST"})
     */
    public function login() : Response
    {

        return new Response(
            "no"
        );
    }
}