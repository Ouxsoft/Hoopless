<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element\Custom\Partial;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

class News extends AbstractElement
{
    private $news = [];
    private $limit = 10;

    public function onLoad()
    {
       $news_id = is_int($this->getArgByName('id')) ? $this->getArgByName('id') : null;
       $limit = is_int($this->getArgByName('limit')) ? $this->getArgByName('limit') : self::$limit;

       if($news_id !== null){
           $this->news = $this->em->getRepository(\App\Entity\News::class)->find($news_id);
       } else {
           $this->news = $this->em->getRepository(\App\Entity\News::class)->findBy(
               [],null, $limit, null
           );
       }
    }

    public function onRender()
    {
        $out = '<!-- News -->';
        foreach ($this->news as $news) {
            $out .= $this->view->render(
                $this->getArgByName('format'),
                [
                    'title' => $this->getArgByName('id') . $news->getTitle(),
                    'body' => $news->getBody(),
                    'publish_date' => $news->getPublishDate()->format('F d, Y')
                ]
            );
        }
        return $out;
    }
}
