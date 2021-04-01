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

class News extends AbstractElement
{
    private $news = [
        [
            'date' => '2020-08-08',
            'title' => 'LHTML Elements Behind Hoopless',
            'body' => '
            <p>We take a quick look at the if statment, variable, and redacted LHTML elements used in Hoopless.</p>
           <iframe width="560" height="315" src="https://www.youtube.com/embed/2w9vNNlsSRg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>'
        ],

        [
            'date' => '2020-08-07',
            'title' => 'LHTML Add Custom Element',
            'body' => '
            <p>See how easy it is to create your own custom LHTML elements using Hoopless. In this example we create our own custom Alert elements that acts as a CSS abstraction layer to generate Bootstrap 4 alerts.</p>
           <iframe width="560" height="315" src="https://www.youtube.com/embed/HxZ2qitsUUs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>'

        ],
        [
            'date' => '2020-08-07',
            'title' => 'LHTML Under the Hood',
            'body' => '
            <p>LHTML works to make communicate the elements of design between team members while still delivering top notch HTML to the web browser</p>
           <iframe width="560" height="315" src="https://www.youtube.com/embed/L4u2qh5Elco" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>'

        ],
        [
            'date' => '2019-01-28',
            'title' => 'Reworking The Language of the Web',
            'body' =>
                '<p>There is something fundamentally wrong about the way web teams work together to build websites. The problem is the language they\'re using, HTML, was not designed to communicate within teams but to a browser. That makes it a poor choice to help empower team members, encourage effective communication, and encode the message that is the site between stakeholders.</p>
                 
                 <p>Watch what we intend to do about it.</p>
                 <iframe width="560" height="315" src="https://www.youtube.com/embed/6zEXsQKPL_M" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>'
        ],

    ];

    private function getNews()
    {
        $out = '';
        foreach ($this->news as $news) {
            $out .= <<<HTML

<article class="mb-5">

    <h3>{$news['title']}</h3>
    <p><i>Published: <date>{$news['date']}</date></i></p>

    {$news['body']}
    <hr/>
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
