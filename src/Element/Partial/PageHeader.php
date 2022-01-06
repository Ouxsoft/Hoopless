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

use App\Entity\Blog;
use App\Entity\News;
use Ouxsoft\PHPMarkup\Element\AbstractElement;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

/**
 * Class PageHeader.
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
            $this->pages[] = ['title' => $news->getTitle(), 'url' => '/news/'.$news->getNewsId(), 'active' => 1];

            return;
        }

        // dynamic blogs
        if (isset($this->blogId)) {
            /** @var News $news */
            $blog = $this->em->getRepository(Blog::class)->find($this->blogId);

            $this->pages[] = ['title' => 'Home', 'url' => '/', 'active' => 0];
            $this->pages[] = ['title' => 'Blog', 'url' => '/blog', 'active' => 0];
            $this->pages[] = ['title' => $blog->getTitle(), 'url' => '/blog/'.$blog->getBlogId(), 'active' => 1];

            return;
        }

        $menu_id = $this->getArgByName('menu_id');
        if ($menu_id) {
            $this->menu = $this->em->getConnection()->fetchAllAssociative(
                'SELECT 
                    COALESCE(`menu_item`.`title`,`page`.`title`) AS `title`, 
                    COALESCE(`page`.`url`, `menu_item`.`url`) AS `url`
                FROM `menu_item`
                LEFT JOIN `page` ON `menu_item`.`page_id` = `page`.`page_id`
                WHERE `menu_id` = ?
                ORDER BY `order`',
                [$menu_id]
            );
        }

        // TODO improve by passing router
        $this->pages = $this->em->getConnection()->fetchAllAssociative(
            'SELECT `title`, `url`, IF(`url`=?, 1, 0) AS `active` 
           FROM ( 
           SELECT @r AS _id,
            (SELECT @r := page_parent_id 
            FROM page WHERE page_id = _id) AS page_parent_id, @l := @l + 1 AS lvl 
           FROM (
            SELECT @r := (SELECT page_id FROM page WHERE url = ?), @l := 0) vars, page h) T1 
            JOIN page T2 ON T1._id = T2.page_id 
           ORDER BY T1.lvl DESC 
           LIMIT 10',
            [$this->url, $this->url]
        );
    }

    public function onRender()
    {
        $session = new Session(new NativeSessionStorage(), new AttributeBag());

        $session->start();

        return $this->view->render('/partial/page-header.html.twig', [
            'page' => [
                'title' => $this->getArgByName('title'),
                'tier' => $this->getArgByName('tier'),
                'image' => $this->getArgByName('image'),
            ],
            'menu' => $this->menu,
            'user' => [
                'username' => $session->get('username', null),
            ],
            'site_name' => $_ENV['SITE_NAME'] ?? 'Site Name',
            'breadcrumbs' => [
                'pages' => $this->pages,
                'frontpage' => $this->getArgByName('frontpage'),
            ],
        ]);
    }
}
