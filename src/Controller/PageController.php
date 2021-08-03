<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Ouxsoft\PHPMarkup\Factory\ProcessorFactory;
use Mustache_Engine;

class PageController
{
    private $processor;

    public function __construct(){
        // define common directories
        define('ROOT_DIR', __DIR__ . '/../../');
        define('PUBLIC_DIR', ROOT_DIR . 'public/');
        define('ASSET_DIR', ROOT_DIR . 'assets/');
        define('IMAGE_DIR', ASSET_DIR . 'images/');
        define('CONFIG_DIR', ROOT_DIR . 'config/');
        define('ENTITY_DIR', ROOT_DIR . 'src/Entity/');

        // load config
        $appConfig = [];
        $appConfig['elements'] = require ROOT_DIR . 'config/elements.php';
        $appConfig['routines'] = require ROOT_DIR . 'config/routines.php';
        $appConfig['database'] = require ROOT_DIR . 'config/database.php';

        // setup doctrine for database access
        $doctrineConfig = Setup::createAnnotationMetadataConfiguration(
            [ENTITY_DIR], true, null, null, false
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
     * @Route("/", methods={"GET"})
     */
    public function frontpage(): Response
    {
        $html = $this->processor->parseFile(__DIR__ . '/../../public/frontpage.php');
        return new Response($html);
    }

    /**
     * @Route("/{page}", name="indexAction", requirements={"page"=".+"})
     */
    public function indexAction($page): Response
    {
        if(substr($page,-1) == '/'){
            return new RedirectResponse('/' . rtrim($page, '/'));
        }

        $filepath = $this->resolveRoute($page);

        $html = $this->processor->parseFile(__DIR__ . '/../../public/' . $filepath);
        return new Response($html);
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

        /*
        // check for directory traversal or if file does not exist
        $real_base = realpath(PUBLIC_DIR);
        $user_path = PUBLIC_DIR . $route;

        $real_user_path = realpath($user_path);

        if (($real_user_path === false)
            || (strpos($real_user_path, $real_base) !== 0)
            || (is_file($route) === false)
        ) {
            // return 404 page
            $route = '404.php';
        }
        */
        return $route;
    }
}