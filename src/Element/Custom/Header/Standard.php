<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Header;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Ouxsoft\PHPMarkup\Element\AbstractElement;
use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;

/**
 * Class Standard
 * @package LHTML\Element\Custom\Header
 */
class Standard extends AbstractElement
{
    public $separator = '/';

    private $pages = [];

    public function onLoad()
    {
        $stmt = $this->em->getConnection()->prepare("
          SELECT `title`, `url`, IF(`url`=:url1, 1, 0) AS `active` 
           FROM ( 
           SELECT @r AS _id,
            (SELECT @r := page_parent_id 
            FROM page WHERE page_id = _id) AS page_parent_id, @l := @l + 1 AS lvl 
           FROM (SELECT @r := (SELECT page_id FROM page WHERE url = :url2), @l := 0) vars, page h) T1 JOIN page T2 ON T1._id = T2.page_id 
           ORDER BY T1.lvl DESC 
           LIMIT 10
           ");
        // TODO improve by passing router
        $stmt->execute([
            'url1' => $_SERVER['REQUEST_URI'],
            'url2' => $_SERVER['REQUEST_URI']
        ]);
        $this->pages = $stmt->fetchAll();
    }

    /**
     * Renders a breadcrumb trail for the current page
     *
     * @return mixed|string
     */
    public function getBreadcrumbs()
    {
        // skip breadcrumb on front page
        if ($this->getArgByName('frontpage')) {
            return '';
        }

        $view = new Mustache_Engine([
            'loader' => new Mustache_Loader_FilesystemLoader(ROOT_DIR . 'templates')
        ]);

        return $view->render('elements/breadcrumb',
            [
                'pages' => $this->pages
            ]
        );
    }


    public function getNavbar()
    {
        $view = new Mustache_Engine([
            'loader' => new Mustache_Loader_FilesystemLoader(ROOT_DIR . 'templates')
        ]);

        return $view->render('elements/top-navbar',
            [
            ]
        );
    }

    public function onRender()
    {
        return <<<HTML
        <!-- Header -->
        <header>
            {$this->getNavbar()}
            {$this->getBreadcrumbs()}
        </header>
HTML;
    }
}
