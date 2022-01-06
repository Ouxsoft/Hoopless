<?php

namespace App\Controller;

use App\Service\PHPMarkup;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/", priority=5, name="frontpageRoute", methods={"GET"})
     */
    public function frontpage(PHPMarkup $phpmarkup): Response
    {
        $phpmarkup->addProperty('url', '/');

        return new Response(
            $phpmarkup->parseFile('frontpage.php')
        );
    }

    /**
     * @Route("/login", priority=5, name="loginRoute", methods={"GET"})
     * @param PHPMarkup $phpmarkup
     * @return Response
     */
    public function loginPage(PHPMarkup $phpmarkup): Response
    {
        $phpmarkup->addProperty('url', '/login');

        return new Response(
            $phpmarkup->parseFile('/login.php')
        );
    }

    /**
     * @Route("/{page}", priority=1, name="subpageRoute", requirements={"page"=".+"})
     */
    public function indexAction(PHPMarkup $phpmarkup, string $page): Response
    {
        $phpmarkup->addProperty('url', '/'.$page);

        if ('/' == substr($page, -1)) {
            return new RedirectResponse('/'.rtrim($page, '/'));
        }

        $filepath = $this->resolveRoute($page);

        $real_path = realpath(__DIR__.'/../../public/'.$filepath);

        // TODO improve traversing check
        if (!file_exists($real_path)) {
            return new Response(
                $phpmarkup->parseFile('404.php')
            );
        }

        return new Response(
            $phpmarkup->parseFile($filepath)
        );
    }

    /**
     * @Route("/blog/{blogId}", priority=2, name="blogRoute")
     */
    public function blogAction(PHPMarkup $phpmarkup, string $blogId): Response
    {
        $phpmarkup->addProperty('blogId', $blogId);
        $phpmarkup->addProperty('url', '/blogs');

        return new Response(
            $phpmarkup->parseFile('blog/view/index.php')
        );
    }

    /**
     * @Route("/news/{newsId}", priority=2, name="newsRoute")
     */
    public function newsAction(PHPMarkup $phpmarkup, string $newsId): Response
    {
        $phpmarkup->addProperty('newsId', $newsId);
        $phpmarkup->addProperty('url', '/news');

        return new Response(
            $phpmarkup->parseFile('news/view/index.php')
        );
    }

    private function resolveRoute($route)
    {
        $route = (string) ltrim($route, '/');

        // send empty request to home
        if ('' == $route || 'index.php' == $route) {
            $route = 'frontpage';
        }

        if (is_dir(__DIR__.'/../../public/'.$route)) {
            $route .= '/index.php';
        }

        // check for file as php file if a extension not provided in request
        $path_info = pathinfo($route);

        if (!array_key_exists('extension', $path_info) || ('' == $path_info['extension'])) {
            $route .= '.php';
        }

        return $route;
    }
}
