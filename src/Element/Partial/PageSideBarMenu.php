<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element\Partial;

use App\Entity\News;
use App\Entity\Blog;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\DBAL\DriverManager;
use Ouxsoft\PHPMarkup\Element\AbstractElement;

class PageSideBarMenu extends AbstractElement
{
    private $menu = [];

    public function onLoad()
    {
        $menu_id = $this->getArgByName('menu_id');
        if ($menu_id) {
            $this->menu = $this->em->getConnection()->fetchAllAssociative('
                SELECT `title`, IF(`menu_item`.`page_id` IS NULL, `menu_item`.`url`, `page`.`url`) AS `url`
                FROM `menu_item`
                LEFT JOIN `page` ON `menu_item`.`page_id` = `page`.`page_id`
                WHERE `menu_id` = ?
                ORDER BY `order`',
                [$menu_id]
            );
        }
    }

    public function onRender()
    {
        return $this->view->render('/page-side-bar-menu.html.twig', [
            'menu' => $this->menu,
        ]);
    }
}
