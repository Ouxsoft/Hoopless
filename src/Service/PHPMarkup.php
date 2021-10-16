<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Ouxsoft\PHPMarkup\Factory\ProcessorFactory;
use Mustache_Engine;

/**
 * Class AuthService
 * @package App\Service
 */
class PHPMarkup
{
    const PAGE_DIR = __DIR__ . '/../../public/';
    const CONFIG_DIR = __DIR__ . '/../../config/';
    const ENTITY_DIR = __DIR__ . '/../../src/Entity/';
    const ASSET_DIR = __DIR__ . '/../../public/assets/';
    const TEMPLATE_DIR = __DIR__ . '/../../templates/';

    private $processor;

    public function __construct()
    {
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

    public function parseFile($filepath)
    {
        return $this->processor->parseFile(self::PAGE_DIR . $filepath);
    }

    public function addProperty($propertyName, $propertyValue)
    {
        $this->processor->addProperty($propertyName, $propertyValue);
    }
}