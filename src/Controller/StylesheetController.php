<?php

namespace App\Controller;

use Exception;
use ScssPhp\ScssPhp\Compiler;
use ScssPhp\ScssPhp\Exception\CompilerException;
use ScssPhp\ScssPhp\Formatter\Compressed;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StylesheetController
{
    public const SCSS_DIR = __DIR__.'/../../public/assets/scss/';
    public const BS_FRAMEWORK_DIR = __DIR__.'/../../vendor/twbs/bootstrap/scss/';
    public const MAIN_CSS_FILEPATH = __DIR__.'/../../public/assets/css/main.min.css';

    public function __construct()
    {
        // TODO: Add ACL
        ini_set('max_execution_time', 120);
    }

    /**
     * @Route("/backend/stylesheet", priority=2, name="stylesheetCompile")
     *
     * @throws CompilerException
     */
    public function compile(): Response
    {
        try {
            $scss = new Compiler();
            $scss->setFormatter(Compressed::class);
            $scss->setImportPaths(self::SCSS_DIR);
            $scss->addImportPath(self::BS_FRAMEWORK_DIR);

            $output = $scss->compile('@import "main.scss";');

            file_put_contents(self::MAIN_CSS_FILEPATH, $output);

            return new Response('Successfully compile stylesheets.');
        } catch (Exception $e) {
            return new Response('Unable to compile stylesheets.');
        }
    }
}
