<?php

namespace App\Controller;

use ScssPhp\ScssPhp\Exception\CompilerException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use ScssPhp\ScssPhp\Compiler;
use ScssPhp\ScssPhp\Formatter\Compressed;

class StylesheetController
{
    const SCSS_DIR = __DIR__ . '/../../public/assets/scss/';
    const BS_FRAMEWORK_DIR = __DIR__ . '/../../vendor/twbs/bootstrap/scss/';
    const MAIN_CSS_FILEPATH = __DIR__ . '/../../public/assets/css/main.min.css';

    public function __construct()
    {
        // TODO: Add ACL
    }

    /**
     * @Route("/backend/stylesheet", priority=2, name="stylesheetCompile")
     * @return Response
     * @throws CompilerException
     */
    public function compile() : Response
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
