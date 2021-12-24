<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Entity\MenuItem;
use App\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\MenuService;
use DateTime;

class MenuController extends AbstractController
{
    /**
     * @Route("/api/menu", priority=5, name="apiMenusRoute", methods={"GET"})
     * @param MenuService $menuService
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

        return new JsonResponse([
            'menus' => $menus
        ]);
    }

    /**
     * @Route("/api/menu/{menuId}", priority=5, name="apiMenuRoute", methods={"GET"})
     * @param MenuService $menuService
     * @param int $menuId
     * @return Response
     */
    public function getMenu(MenuService $menuService, int $menuId): Response
    {
        $now = new DateTime();

        /** @var Menu $menu */
        $menu = $menuService->getMenu($menuId);

        $items = [];
        foreach($menu->getItems() as &$item){
            /** @var MenuItem $item */
            $items[] =  [
                'menuItemId' => $item->getMenuItemId(),
                'parentMenuItemId' => $item->getParentMenuItemId(),
                'displayUrl' => ($item->getPage() instanceof Page) ? $item->getPage()->getUrl() : $item->getUrl(),
                'displayTitle' => $item->getTitle() ?? (($item->getPage() instanceof Page) ? $item->getPage()->getTitle() : null),
                'pageId' => ($item->getPage() instanceof Page) ? $item->getPageId() : null,
                'pageTitle' => ($item->getPage() instanceof Page) ? $item->getPage()->getTitle() : null,
                'pageUrl' => ($item->getPage() instanceof Page) ? $item->getPage()->getUrl() : null,
                'title' => $item->getTitle(),
                'url' => $item->getUrl(),
                'order' => $item->getOrder(),
                'daysAgo' => $item->getCreated()->diff($now)->format('%a'),
                'created' => $item->getCreated()->format('Y-m-d'),
                'updated' => $item->getUpdated()->format('Y-m-d')
            ];
        }

        return new JsonResponse([
            'menuId' =>  $menu->getMenuId(),
            'name' => $menu->getName(),
            'items' => $items
        ]);
    }
}
