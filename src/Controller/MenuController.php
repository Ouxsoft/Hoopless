<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\MenuService;

class MenuController extends AbstractController
{
    /**
     * @Route("/api/menu", priority=5, name="apiMnuRoute", methods={"GET"})
     * @return Response
     */
    public function getMenus(MenuService $menuService): Response
    {
        $results = $menuService->getMenus();
        $menus = [];
        foreach($results as $menu){
            $menus[] = [
                'menuId' => $menu->getMenuId(),
                'name' => $menu->getName() 
            ];
        }

        return new JsonResponse(['menus' => $menus]);
    }
}