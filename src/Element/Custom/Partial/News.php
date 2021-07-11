<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Partial;

use Ouxsoft\PHPMarkup\Element\AbstractElement;
use Mustache_Engine;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class News extends AbstractElement
{
    private $news = [];

    public function onLoad()
    {
        $this->news = $this->em->getRepository(\Ouxsoft\Hoopless\Entity\News::class)->findBy(
            [],null, $this->getArgByName('limit'), null
        );
    }

    public function onRender()
    {
        $out = '';
        foreach ($this->news as $news) {
            $out .= $this->view->render(
                $this->getArgByName('format'),
                [
                    'title' => $news->getTitle(),
                    'body' => $news->getBody(),
                    'publish_date' => $news->getPublishDate()->format('F d, Y')
                ]
            );
        }
        return $out;
    }
}
