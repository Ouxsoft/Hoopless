<?php

namespace App\Controller;

use App\Service\PHPMarkup;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Ouxsoft\PHPMarkup\Factory\ProcessorFactory;
use Laminas\Validator\File\Exists;
use Mustache_Engine;

class PageController extends AbstractController
{
    /**
     * @Route("/", priority=5, name="frontpageRoute", methods={"GET"})
     * @param PHPMarkup $phpmarkup
     * @return Response
     */
    public function frontpage(PHPMarkup $phpmarkup): Response
    {
        return new Response(
            $phpmarkup->parseFile('frontpage.php')
        );
    }

    /**
     * @Route("/backend/login", priority=5, name="loginRoute", methods={"GET"})
     * @param PHPMarkup $phpmarkup
     * @return Response
     */
    public function loginpage(PHPMarkup $phpmarkup): Response
    {
        return new Response(
            $phpmarkup->parseFile('backend/login.php')
        );
    }

    /**
     * @Route("/{page}", priority=1, name="subpageRoute", requirements={"page"=".+"})
     * @param PHPMarkup $phpmarkup
     * @param string $page
     * @return Response
     */
    public function indexAction(PHPMarkup $phpmarkup, string $page): Response
    {
        if(substr($page,-1) == '/'){
            return new RedirectResponse('/' . rtrim($page, '/'));
        }

        $filepath = $this->resolveRoute($page);

        $real_path = realpath(__DIR__ . '/../../public/' .$filepath);

        // TODO improve traversing check
        if(!file_exists($real_path)){
            return new Response(
                $phpmarkup->parseFile('404.php')
            );
        }

        return new Response(
            $phpmarkup->parseFile($filepath)
        );
    }

    /**
     * @Route("/news/{newsId}", priority=2, name="newsRoute")
     * @param string $newsId
     * @return Response
     */
    public function newsAction(PHPMarkup $phpmarkup, string $newsId): Response
    {
        $phpmarkup->addProperty('newsId', $newsId);
        return new Response(
            $phpmarkup->parseFile('news/view/index.php')
        );
    }

    private function resolveRoute($route)
    {
        $route = (string) ltrim($route, '/');

        // send empty request to home
        if ($route == '' || $route == 'index.php') {
            $route = 'frontpage';
        }

        if(is_dir(__DIR__ . '/../../public/' . $route)){
            $route .= '/index.php';
        }

        // check for file as php file if a extension not provided in request
        $path_info = pathinfo($route);

        if (!array_key_exists('extension', $path_info) || ($path_info['extension'] == '')) {
            $route .= '.php';
        }

        return $route;
    }
}