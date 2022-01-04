<?php

namespace App\Service;

/**
 * Class AuthService.
 */
class SessionService
{
    public function signin(string $username, string $password): bool
    {
        // check for admin credentials
        if (
            ($username == $_ENV['ADMIN_USERNAME'])
            && ($password == $_ENV['ADMIN_PASSWORD'])
        ) {
            session_start();
            $_SESSION['username'] = $_ENV['ADMIN_USERNAME'];

            return true;
        }

        // todo add check for user credentials

        return false;
    }

    public function signout()
    {
        session_start();
        unset($_SESSION['username']);
    }

}
