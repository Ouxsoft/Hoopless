<?php

namespace App\Controller;

use App\Service\SessionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    /**
     * @Route("/session/signin", priority=5, name="signin", methods={"POST"})
     *
     * @param Request $request
     * @param SessionService $sessionService
     * @return RedirectResponse
     */
    public function signIn(Request $request, SessionService $sessionService): Response
    {
        $username = $request->get('username') ?? '';
        $password = $request->get('password') ?? '';

        if ($sessionService->signIn($username, $password)) {
            return $this->redirectToRoute('frontpageRoute');
        }

        return $this->redirectToRoute('loginRoute');
    }

    /**
     * @Route("/session/signout", priority=5, name="signout", methods={"GET"})
     *
     * @param Request $request
     * @param SessionService $sessionService
     * @return RedirectResponse
     */
    public function signOut(Request $request, SessionService $sessionService): Response
    {
        $sessionService->signOut();

        return $this->redirectToRoute('frontpageRoute');
    }


}
