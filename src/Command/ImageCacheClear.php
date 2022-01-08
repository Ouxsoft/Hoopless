<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

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
        $io = new SymfonyStyle($input, $output);

        shell_exec("find {$this->imageCacheDir} -type f -not -name '.gitignore' -delete");

        $io->success('Image cache cleared');

        return Command::SUCCESS;
    }
}
