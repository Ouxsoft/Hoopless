<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

define('ROOT_DIR', __DIR__ . '/../');
define("SCSS_DIR", ROOT_DIR . 'assets/scss/');
define('BS_FRAMEWORK_DIR', ROOT_DIR . 'vendor/twbs/bootstrap/scss/');
define('MAIN_CSS_DIR', ROOT_DIR . 'public/assets/css/main.min.css');

require ROOT_DIR . 'vendor/autoload.php';

use ScssPhp\ScssPhp\Compiler;

try{
    $scss = new Compiler();
    $scss->setFormatter(ScssPhp\ScssPhp\Formatter\Compressed::class);

    // set root import path and add additional paths
    $scss->setImportPaths(SCSS_DIR);
    $scss->addImportPath(BS_FRAMEWORK_DIR);

    // compile
    $output = $scss->compile('@import "main.scss";');

    // save
    file_put_contents(MAIN_CSS_DIR, $output);
} catch (Exception $e){
    trigger_error('Unable to compile SASS content', E_USER_ERROR);
}

