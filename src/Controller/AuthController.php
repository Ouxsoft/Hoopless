<?php

namespace App\Controller;

use App\Service\AuthService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    /**
     * @Route("/auth/login", priority=5, name="authenicate", methods={"POST"})
     *
     * @return RedirectResponse
     */
    public function login(Request $request, AuthService $authService): Response
    {
        $username = $request->get('username') ?? '';
        $password = $request->get('password') ?? '';

        if ($authService->authenticate($username, $password)) {
            return $this->redirectToRoute('frontpageRoute');
        }

        return $this->redirectToRoute('loginRoute');
    }
}
