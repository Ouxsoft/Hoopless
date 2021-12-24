<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;
use App\Entity\Menu;
use App\Entity\MenuItem;

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

    public function getMenu(int $menuId)
    {
        $menu = $this->em->getRepository(Menu::class)->find($menuId);
        return $menu ?? [];
    }
}