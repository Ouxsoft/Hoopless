<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

/**
 * Class AuthService.
 */
class SessionService
{
    /**
     * @var Session
     */
    private $session;

    /**
     * SessionService constructor.
     */
    public function __construct()
    {
        $this->session = new Session(new NativeSessionStorage(), new AttributeBag());

        $this->session->start();
    }

    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function signIn(string $username, string $password): bool
    {
        // check for admin credentials
        if (
            ($username == $_ENV['ADMIN_USERNAME'])
            && ($password == $_ENV['ADMIN_PASSWORD'])
        ) {
            $this->session->set('username', $_ENV['ADMIN_USERNAME']);

            return true;
        }

        // todo add check for user credentials

        return false;
    }

    public function signOut()
    {
        $this->session->clear();
    }

}
