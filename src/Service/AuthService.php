<?php

namespace App\Service;

/**
 * Class AuthService
 * @package App\Service
 */
class AuthService
{
    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function authenticate(string $username, string $password) : bool
    {
        // check for admin credentials
        if(
            ($username == $_ENV['ADMIN_USERNAME'])
            && ($password == $_ENV['ADMIN_PASSWORD'])
        ) {
            $_SESSION['username'] = $_ENV['ADMIN_USERNAME'];
            return true;
        }

        // todo add check for user credentials

        return false;
    }
}