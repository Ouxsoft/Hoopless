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
        $doctrineConfig = Setup::createAnnotationMetadataConfiguration(
            [ENTITY_DIR], true, null, null, false
        );

        $dbParams = [
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => '',
            'dbname'   => 'hoopless',
            'host' => 'mysql'
        ];

        $em = EntityManager::create(
            $dbParams,
            $doctrineConfig
        );

        $this->news = $em->getRepository(\Ouxsoft\Hoopless\Entity\News::class)->findBy([]);

    }

    public function onRender()
    {
        $view = new Mustache_Engine([
            'entity_flags' => ENT_QUOTES,
            'escape' => function($value) {
                return $value;
            },
        ]);

        $count = 0;
        $out = '';
        foreach ($this->news as $news) {
            if($count >= $this->getArgByName('limit')){
                break;
            }

            $out .= $view->render(
                $this->getArgByName('format'),
                [
                    'title' => $news->getTitle(),
                    'body' => $news->getBody(),
                    'publish_date' => $news->getPublishDate()->format('F d, Y')
                ]
            );

            $count++;
        }
        return $out;
    }
}
