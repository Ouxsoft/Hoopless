<?php

namespace App\Service;

use App\Model\UniqueArray;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Ouxsoft\PHPMarkup\Factory\ProcessorFactory;
use Twig\Environment;
use Twig\Extension\StringLoaderExtension;
use Twig\Loader\FilesystemLoader;

class PHPMarkupService
{
    // TODO remove trailing slash
    public const PAGE_DIR = __DIR__ . '/../../public/';
    public const CONFIG_DIR = __DIR__ . '/../../config/';

    private $processor;

    public function __construct(EntityManager $em, Environment $twig)
    {
        // load config
        $appConfig = [];
        $appConfig['elements'] = require self::CONFIG_DIR.'elements.php';
        $appConfig['routines'] = require self::CONFIG_DIR.'routines.php';

        // instantiate processor with configuration and set to parse buffer
        $this->processor = ProcessorFactory::getInstance();

        $this->processor->addRoutines($appConfig['routines']);
        $this->processor->addElements($appConfig['elements']);

        // twig
        $twig->addExtension(new StringLoaderExtension());
        $this->processor->addProperty('view', $twig);

        // em
        $this->processor->addProperty('em', $em);

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
