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

class News extends AbstractElement
{
    private $news = [];
    private $limit = 10;

    public function onLoad()
    {
        $limit = is_int($this->getArgByName('limit')) ? $this->getArgByName('limit') : self::$limit;

        if (isset($this->newsId)) {
            $this->news[] = $this->em->getRepository(\App\Entity\News::class)->find($this->newsId);
        } else {
            $this->news = $this->em->getRepository(\App\Entity\News::class)->findBy(
                [],
                null,
                $limit,
                null
            );
        }
    }

    public function onRender()
    {
        $stories = [];
        foreach ($this->news as $news) {
            $stories[] = [
                'format' => $this->getArgByName('format'),
                'news_id' => $news->getNewsId(),
                'title' => $news->getTitle(),
                'body' => $news->getBody(),
                'publish_date' => $news->getPublishDate()->format('F d, Y'),
            ];
        }

        return $this->view->render('news.html.twig', [
            'stories' => $stories,
        ]);
    }
}
