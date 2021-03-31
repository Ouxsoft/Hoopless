<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Ouxsoft\PHPMarkup\Factory\ProcessorFactory;
use Hoopless\Router;

require_once '../vendor/autoload.php';

// define common directories
define('ROOT_DIR', dirname(__DIR__, 1) . '/');
define('PUBLIC_DIR', ROOT_DIR . 'public/');
define('ASSET_DIR', ROOT_DIR . 'assets/');
define('IMAGE_DIR', ASSET_DIR . 'images/');
define('CONFIG_DIR', ROOT_DIR . 'config/');

// set include path
set_include_path(ROOT_DIR);

// instantiate processor with configuration and set to parse buffer
global $processor;
$processor = ProcessorFactory::getInstance();
$processor->loadConfig(CONFIG_DIR . 'config.dist.json');
$processor->parseBuffer();

// Route traffic to a specific file
$router = new Router();
$router->response();

// if response is a blank document chances are the page is missing a root element