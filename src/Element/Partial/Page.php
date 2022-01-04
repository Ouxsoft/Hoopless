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
 * Class Page.
 */
class Page extends AbstractElement
{
    private $info = [];

    public function onLoad()
    {
        $this->stylesheets->add('/assets/css/main.min.css');

        $this->javascripts->add('/assets/js/jquery/jquery.min.js');
        $this->javascripts->add('/assets/js/bootstrap/bootstrap.min.js');

        // @todo add author from PageRevision userID
        $this->info = $this->em->getConnection()->fetchAssociative(
            'SELECT `page_id`, `title`, `keywords`, `template` 
            FROM `page` 
            WHERE `url` = ? 
            LIMIT 1',
            [$this->url]
        );
    }

    public function onRender()
    {
        return $this->view->render('/partial/page.html.twig', [
            'title' => $this->info['title'] ?? null,
            'page_id' => $this->info['page_id'] ?? null,
            'template' => $this->info['template'] ?? null,
            'meta' => [
                'keywords' => $this->info['keywords'] ?? null,
                'author' => $this->info['author'] ?? null,
            ],
            'stylesheets' => $this->stylesheets->get() ?? null,
            'javascripts' => $this->javascripts->get() ?? null,
            'scripts' => $this->scripts->get() ?? null,
            'html' => $this->innerText(),
        ]);
    }
}
