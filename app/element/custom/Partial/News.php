<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Partial;

use LivingMarkup\Element\AbstractElement;

class News extends AbstractElement
{
    private $news = [
        [
            'date' => '2019-01-28',
            'title' => 'Reworking The Language of the Web',
            'body' =>
                '<p>There is something fundamentally wrong about the way web teams work together to build websites. The problem is the language they are using is not empowering.</p>
     
     <p>Watch what we intend to do about it.</p>
     <iframe width="560" height="315" src="https://www.youtube.com/embed/6zEXsQKPL_M&rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>'
        ],

    ];

    private function getNews()
    {
        $out = '';
        foreach ($this->news as $news) {
            $out .= <<<HTML
<article>
    <h3>{$news['title']}</h3>
    <hr/>
    <p>Published: <date>{$news['date']}</date></p>
    {$news['body']}
</article>
HTML;
        }
        return $out;
    }

    public function onRender()
    {
        return <<<HTML
<!-- News -->
<section id="news">
{$this->getNews()}
</section>
HTML;
    }
}
