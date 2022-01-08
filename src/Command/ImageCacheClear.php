<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImageCacheClear extends Command
{
    private $imageCacheDir = __DIR__ . '/../../var/cache/images/';

    protected static $defaultName = 'cache:clear-images';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Clear image cache');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        shell_exec("find {$this->imageCacheDir} -type f -not -name '.gitignore' -delete");

        return Command::SUCCESS;
    }
}
