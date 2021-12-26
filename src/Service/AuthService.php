<?php

namespace App\Service;

/**
 * Class AuthService.
 */
class AuthService
{
    public function authenticate(string $username, string $password): bool
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
}
