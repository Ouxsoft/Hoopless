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
use Ouxsoft\Hoopless\Entity\News as NewsEntity;
use Mustache_Engine;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class News extends AbstractElement
{

    private $news = [
        [
            'date' => '2021-04-29',
            'url' => '/news/',
            'title' => 'Introducing PHPMarkup',
            'body' => '
            <p>We have decided to rename LivingMarkup to PHPMarkup to better reflect the purpose of the library.
            To be honest, this is the third time we have had to renamed the library (formally LivingMarkup was known as PXP).</p>
            <p>We hope PHPMarkup better conveys the purpose of the library. In the same way that PHP is interpreted into C to 
            allow developers to write powerful applications, PHPMarkup is a library that allows 
            curators to use markup to safely instantiate PHP classes and invoke methods.</p>
            <p>Other than that, PHPMarkup has become a relatively stable library. It is actually amazing how well it
             helps us run sites and minimize the code we need to maintain.</p>'
        ],
        [
            'date' => '2020-08-08',
            'url' => '/news/',
            'title' => 'LHTML Elements Behind Hoopless',
            'body' => '
            <p>We take a quick look at the if statment, variable, and redacted LHTML elements used in Hoopless.</p>
           <iframe width="560" height="315" src="https://www.youtube.com/embed/2w9vNNlsSRg" frameborder="0" 
           allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>'
        ],
        [
            'date' => '2020-08-07',
            'url' => '/news/',
            'title' => 'LHTML Add Custom Element',
            'body' => '
            <p>See how easy it is to create your own custom LHTML elements using Hoopless. In this example we create 
            our own custom Alert elements that acts as a CSS abstraction layer to generate Bootstrap 4 alerts.</p>
           <iframe width="560" height="315" src="https://www.youtube.com/embed/HxZ2qitsUUs" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>'

        ],
        [
            'date' => '2020-08-07',
            'url' => '/news/',
            'title' => 'LHTML Under the Hood',
            'body' => '
            <p>LHTML works to make communicate the elements of design between team members while still delivering top 
            notch HTML to the web browser</p>
           <iframe width="560" height="315" src="https://www.youtube.com/embed/L4u2qh5Elco" frameborder="0" 
           allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>'

        ],
        [
            'date' => '2019-01-28',
            'url' => '/news/',
            'title' => 'Reworking The Language of the Web',
            'body' => '
               <p>There is something fundamentally wrong about the way web teams work together to build websites.
               The problem is the language they\'re using, HTML, was not designed to communicate within teams but to a 
               browser. That makes it a poor choice to help empower team members, encourage effective communication, 
               and encode the message that is the site between stakeholders.</p>
               <p>Watch what we intend to do about it.</p>
               <iframe width="560" height="315" src="https://www.youtube.com/embed/6zEXsQKPL_M" frameborder="0" 
               allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
               allowfullscreen="allowfullscreen"></iframe>'
        ],
    ];


    public function onLoad()
    {
        $doctrineConfig = Setup::createAnnotationMetadataConfiguration(
            [__DIR__ . '/../entities'], true, null, null, false
        );

        $entityManager = EntityManager::create(
            [
                'dbname' => self::$config['database']['db']['dbname'],
                'user' => self::$config['database']['db']['username'],
                'password' => self::$config['database']['db']['password'],
                'host' => self::$config['database']['db']['host'],
                'driver' => self::$config['database']['db']['driver'],
            ],
            $doctrineConfig
        );

        $news = $entityManager->getRepository(NewsEntity::class)->findBy(
            ['status' => 'live'],
            ['date'=> 'ASC', 10, 0]
        );
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
                $news
            );

            $count++;
        }
        return $out;
    }
}
