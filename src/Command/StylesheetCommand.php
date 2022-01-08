<?php

namespace App\Command;

use ScssPhp\ScssPhp\Compiler;
use ScssPhp\ScssPhp\OutputStyle;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StylesheetCommand extends Command
{
    private const SCSS_DIR = __DIR__.'/../../public/assets/scss/';
    private const FRAMEWORK_DIR = __DIR__.'/../../vendor/twbs/bootstrap/scss/';
    private const MAIN_CSS_FILEPATH = __DIR__.'/../../public/assets/css/main.min.css';

    protected static $defaultName = 'scss:build';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Build CSS files from SCSS');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $scss = new Compiler();
            $scss->setOutputStyle(OutputStyle::COMPRESSED);
            $scss->setImportPaths(self::SCSS_DIR);
            $scss->addImportPath(self::FRAMEWORK_DIR);

            $output = $scss->compileString('@import "main.scss";');

            file_put_contents(self::MAIN_CSS_FILEPATH, $output);

            return Command::SUCCESS;

        } catch (Exception $e) {
            return Command::FAILURE;
        }
    }
}
