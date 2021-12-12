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

/**
 * Class PageHeader
 * @package LHTML\Element\Partial\PageHeader
 */
class PageHeader extends AbstractElement
{
    public $separator = '/';

    private $pages = [];

    private $menu = [];

    public function onLoad()
    {
        // TODO move

        // breadcrumbs

        // dynamic news
        if (isset($this->newsId)) {
            /** @var News $news */
            $news = $this->em->getRepository(News::class)->find($this->newsId);

            $this->pages[] = ['title' => 'Home', 'url' => '/', 'active' => 0];
            $this->pages[] = ['title' => 'News', 'url' => '/news', 'active' => 0];
            $this->pages[] = ['title' => $news->getTitle(), 'url' => '/news/' . $news->getNewsId(), 'active' => 1];
            return;
        }

        // dynamic blogs
        if (isset($this->blogId)) {
            /** @var News $news */
            $blog = $this->em->getRepository(Blog::class)->find($this->blogId);

            $this->pages[] = ['title' => 'Home', 'url' => '/', 'active' => 0];
            $this->pages[] = ['title' => 'Blog', 'url' => '/blog', 'active' => 0];
            $this->pages[] = ['title' => $blog->getTitle(), 'url' => '/blog/' . $blog->getBlogId(), 'active' => 1];
            return;
        }

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

        // TODO improve by passing router
        $this->pages = $this->em->getConnection()->fetchAllAssociative('
           SELECT `title`, `url`, IF(`url`=?, 1, 0) AS `active` 
           FROM ( 
           SELECT @r AS _id,
            (SELECT @r := page_parent_id 
            FROM page WHERE page_id = _id) AS page_parent_id, @l := @l + 1 AS lvl 
           FROM (
            SELECT @r := (SELECT page_id FROM page WHERE url = ?), @l := 0) vars, page h) T1 
            JOIN page T2 ON T1._id = T2.page_id 
           ORDER BY T1.lvl DESC 
           LIMIT 10',
            [
                $_SERVER['REQUEST_URI'],
                $_SERVER['REQUEST_URI']
            ]
        );
    }

    public function onRender()
    {
        return $this->view->render('/page-header.html.twig', [
            'page' => [
                'tier' => $this->getArgByName('tier'),
                'title' => $this->getArgByName('title'),
                'image' => $this->getArgByName('image'),
            ],
            'menu' => $this->menu,
            'top_navbar' => [],
            'main_navbar' => [
                'username' => $_SESSION['username'] ?? null
            ],
            'breadcrumbs' => [
                'pages' => $this->pages,
                'frontpage' => $this->getArgByName('frontpage')
            ]
        ]);
    }
}
