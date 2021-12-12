<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;
use App\Entity\Menu;

/**
 * Class AuthService
 * @package App\Service
 */
class MenuService
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getMenus()
    {
        $menus = $this->em->getRepository(Menu::class)->findBy([]);
        return $menus ?? [];
    }
}