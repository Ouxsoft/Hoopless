<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
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
     * @var EntityManager
     */
    private $em;

    /**
     * SessionService constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
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
        // add hash

        /** @var User $user */
        $user = $this->em->getRepository(User::class)->findOneBy([
            'username' => $username,
            'password' => $password
        ]);

        if($user === null){
            return false;
        }

        $this->session->set('username', $user->getUsername());
        $this->session->set('userId', $user->getUserId());
        return true;
    }

    public function signOut()
    {
        $this->session->clear();
    }
}
