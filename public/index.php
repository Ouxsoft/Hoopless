<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once '../vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Ouxsoft\PHPMarkup\Factory\ProcessorFactory;
use Ouxsoft\Hoopless\Router;

// define common directories
define('ROOT_DIR', __DIR__ . '/../');
define('PUBLIC_DIR', ROOT_DIR . 'public/');
define('ASSET_DIR', ROOT_DIR . 'assets/');
define('IMAGE_DIR', ASSET_DIR . 'images/');
define('CONFIG_DIR', ROOT_DIR . 'config/');
define('ENTITY_DIR', ROOT_DIR . 'src/Entity/');

// set include path
set_include_path(ROOT_DIR);

// load config
$appConfig = [];
$appConfig['elements'] = require ROOT_DIR . 'config/elements.config.php';
$appConfig['routines'] = require ROOT_DIR . 'config/routines.config.php';
$appConfig['database'] = require ROOT_DIR . 'config/database.config.php';

// setup doctrine for database access
$doctrineConfig = Setup::createAnnotationMetadataConfiguration(
    [ENTITY_DIR], true, null, null, false
);
$entityManager = EntityManager::create(
    $appConfig['database'],
    $doctrineConfig
);

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
$processor = ProcessorFactory::getInstance();
$processor->addRoutines($appConfig['routines']);
$processor->addElements($appConfig['elements']);
$processor->addProperty('view', $mustacheEngine);
$processor->addProperty('em', $entityManager);
$processor->parseBuffer();

// Route traffic to a specific file
$router = new Router();
$router->response();

// if response is a blank document chances are the page is missing a root element
