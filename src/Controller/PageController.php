<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Ouxsoft\PHPMarkup\Factory\ProcessorFactory;
use Laminas\Validator\File\Exists;
use Mustache_Engine;

class PageController
{
    const PAGE_DIR = __DIR__ . '/../../public/';
    const CONFIG_DIR = __DIR__ . '/../../config/';
    const ENTITY_DIR = __DIR__ . '/../../src/Entity/';
    const ASSET_DIR = __DIR__ . '/../../public/assets/';
    const TEMPLATE_DIR = __DIR__ . '/../../templates/';

    private $processor;

    public function __construct(){
        // load config
        $appConfig = [];
        $appConfig['elements'] = require self::CONFIG_DIR . 'elements.php';
        $appConfig['routines'] = require self::CONFIG_DIR . 'routines.php';
        $appConfig['database'] = require self::CONFIG_DIR . 'database.php';

        // setup doctrine for database access
        $doctrineConfig = Setup::createAnnotationMetadataConfiguration(
            [self::ENTITY_DIR], true, null, null, false
        );
        $entityManager = EntityManager::create(
            $appConfig['database'],
            $doctrineConfig
        );

        // TODO switch over to twig?
        // setup mustache for templating engine
        $mustacheEngine = new Mustache_Engine([
            'entity_flags' => ENT_QUOTES,
            'escape' => function($value) {
                return $value;
            },
            //    'template_class_prefix' => '__MyTemplates_',
            //    'cache' => dirname(__FILE__).'/tmp/cache/mustache',
            //    'loader' => new Mustache_Loader_FilesystemLoader(ROOT_DIR . 'templates')
        ]);

        // instantiate processor with configuration and set to parse buffer
        $this->processor = ProcessorFactory::getInstance();
        $this->processor->addRoutines($appConfig['routines']);
        $this->processor->addElements($appConfig['elements']);
        $this->processor->addProperty('view', $mustacheEngine);
        $this->processor->addProperty('em', $entityManager);
    }

    /**
     * @Route("/", priority=5, name="frontpageRoute", methods={"GET"})
     */
    public function frontpage(): Response
    {
        $html = $this->processor->parseFile(self::PAGE_DIR . 'frontpage.php');
        return new Response($html);
    }

    /**
     * @Route("/{page}", priority=1, name="subpageRoute", requirements={"page"=".+"})
     * @param string $page
     * @return Response
     */
    public function indexAction(string $page): Response
    {
        if(substr($page,-1) == '/'){
            return new RedirectResponse('/' . rtrim($page, '/'));
        }

        $filepath = $this->resolveRoute($page);

        $real_path = realpath(self::PAGE_DIR .$filepath);

        // TODO improve traversing check
        if(!file_exists($real_path)){
             return new Response(
                $this->processor->parseFile(self::PAGE_DIR . '404.php')
            );
        }

        return new Response(
            $this->processor->parseFile(self::PAGE_DIR . $filepath)
        );
    }

    /**
     * @Route("/news/{newsId}", priority=2, name="newsRoute")
     * @param string $newsId
     * @return Response
     */
    public function newsAction(string $newsId): Response
    {
        $this->processor->addProperty('newsId', $newsId);
        return new Response(
            $this->processor->parseFile(self::PAGE_DIR . 'news/view/index.php')
        );
    }

    private function resolveRoute($route)
    {
        $route = (string) ltrim($route, '/');

        // send empty request to home
        if ($route == '' || $route == 'index.php') {
            $route = 'frontpage';
        }

        if(is_dir(self::PAGE_DIR . $route)){
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