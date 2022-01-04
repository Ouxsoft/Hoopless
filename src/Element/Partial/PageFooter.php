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

use Ouxsoft\PHPMarkup\Element\AbstractElement;

/**
 * Class PageFooter.
 */
class PageFooter extends AbstractElement
{
    private $menu;

    public function onLoad()
    {
        $menu_id = 3;
        $this->menu = $this->em->getConnection()->fetchAllAssociative(
            '
            SELECT 
                COALESCE(`menu_item`.`title`, `page`.`title`) as `title`,
                IF(`menu_item`.`page_id` IS NULL, `menu_item`.`url`, `page`.`url`) AS `url`
            FROM `menu_item`
            LEFT JOIN `page` ON `menu_item`.`page_id` = `page`.`page_id`
            WHERE `menu_id` = ?
            ORDER BY `order`',
            [$menu_id]
        );
    }

    public function onRender()
    {
        return $this->view->render('/partial/page-footer.html.twig', [
            'site_name' => $_ENV['SITE_NAME'],
            'year' => date('Y'),
            'menu' => $this->menu,
        ]);
    }
}
