<?php

namespace App\Service;

use App\Model\UniqueArray;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Ouxsoft\PHPMarkup\Factory\ProcessorFactory;
use Twig\Environment;
use Twig\Extension\StringLoaderExtension;
use Twig\Loader\FilesystemLoader;

/**
 * Class AuthService.
 */
class PHPMarkup
{
    // TODO remove trailing slash
    public const PAGE_DIR = __DIR__.'/../../public/';
    public const CONFIG_DIR = __DIR__.'/../../config/';
    public const ENTITY_DIR = __DIR__.'/../../src/Entity/';
    public const ASSET_DIR = __DIR__.'/../../public/assets/';
    public const TEMPLATE_DIR = __DIR__.'/../../public/assets/templates/';

    private $processor;

    public function __construct()
    {
        // load config
        $appConfig = [];
        $appConfig['elements'] = require self::CONFIG_DIR.'elements.php';
        $appConfig['routines'] = require self::CONFIG_DIR.'routines.php';
        $appConfig['database'] = require self::CONFIG_DIR.'database.php';

        // instantiate processor with configuration and set to parse buffer
        $this->processor = ProcessorFactory::getInstance();

        $this->processor->addRoutines($appConfig['routines']);
        $this->processor->addElements($appConfig['elements']);

        // setup twig
        $loader = new FilesystemLoader(self::TEMPLATE_DIR);
        $twig = new Environment($loader);
        $twig->addExtension(new StringLoaderExtension());
        $this->processor->addProperty('view', $twig);

        // setup doctrine for database access
        $doctrineConfig = Setup::createAnnotationMetadataConfiguration(
            [self::ENTITY_DIR],
            true,
            null,
            null,
            false
        );
        $entityManager = EntityManager::create(
            $appConfig['database'],
            $doctrineConfig
        );
        $this->processor->addProperty('em', $entityManager);

        // stylesheets
        $stylesheets = new UniqueArray();
        $this->processor->addProperty('stylesheets', $stylesheets);

        // include javascript
        $javascripts = new UniqueArray();
        $this->processor->addProperty('javascripts', $javascripts);

        // inline scripts
        $scripts = new UniqueArray();
        $this->processor->addProperty('scripts', $scripts);
    }

    public function parseFile($filepath)
    {
        return $this->processor->parseFile(self::PAGE_DIR.$filepath);
    }

    public function addProperty($propertyName, $propertyValue)
    {
        $this->processor->addProperty($propertyName, $propertyValue);
    }
}
