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

class Blog extends AbstractElement
{
    private $blogs = [];
    private $limit = 10;

    public function onLoad()
    {
       $limit = is_int($this->getArgByName('limit')) ? $this->getArgByName('limit') : self::$limit;

       if(isset($this->blogId)){
           $this->blogs[] = $this->em->getRepository(\App\Entity\Blog::class)->find($this->blogId);
       } else {
           $this->blogs = $this->em->getRepository(\App\Entity\Blog::class)->findBy(
               [],null, $limit, null
           );
       }
    }

    public function onRender()
    {
        $blogs = [];
        foreach ($this->blogs as $blog) {
            $blogs[] = [
                'format' => $this->getArgByName('format'),
                'blog_id' => $blog->getBlogId(),
                'title' => $blog->getTitle(),
                'body' => $blog->getBody(),
                'publish_date' => $blog->getPublishDate()->format('F d, Y')
            ];
        }

        return $this->view->render('blog.html.twig', [
            'blogs' => $blogs
        ]);
    }
}
