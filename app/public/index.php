<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use LivingMarkup\Autoloader;

require_once '../vendor/autoload.php';

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

// define common directories
define('ROOT_DIR', dirname(__DIR__, 1) . '/');
define('PUBLIC_DIR', ROOT_DIR . 'public/');
define('ASSET_DIR', ROOT_DIR . 'assets/');
define('IMAGE_DIR', ASSET_DIR . 'images/');

// set include path
set_include_path(ROOT_DIR);

/**
 * Route traffic to a specific file
 * (chances are if response is blank the document is missing a root element)
 */

global $proc;
$proc = new LivingMarkup\Processor();

$proc->addElement('Code',"//code[not(ancestor::*[@process='false'])]",'LHTML\Element\Core\Code');
$proc->addElement('If Statement',"//if[not(ancestor::*[@process='false'])]",'LHTML\Element\Core\IfStatement');
$proc->addElement('Variable',"//var[not(ancestor::*[@process='false'])]",'LHTML\Element\Core\Variable');
// $proc->addElement('Image',"//img[not(ancestor::*[@process='false'])]",'LHTML\Element\Core\Image');
$proc->addElement('Hyperlink',"//a[not(ancestor::*[@process='false'])]",'LHTML\Element\Core\Hyperlink');
$proc->addElement('Redact',"//redact[not(ancestor::*[@process='false'])]",'LHTML\Element\Core\Redact');
$proc->addElement("Block[not(ancestor::*[@process='false'])]","//block[not(ancestor::*[@process='false'])]",'LHTML\Element\Custom\Blocks\{name}');
$proc->addElement('Partial',"//partial[not(ancestor::*[@process='false'])]",'LHTML\Element\Custom\Partial\{name}');
$proc->addElement('Widget',"//widget[not(ancestor::*[@process='false'])]",'LHTML\Element\Custom\Widgets\{name}');
$proc->addElement('Nav',"//nav[not(ancestor::*[@process='false']|ancestor::main)]",'LHTML\Element\Custom\Nav\{name}');
$proc->addElement('Head',"//head[not(ancestor::*[@process='false'])]",'LHTML\Element\Custom\Head\{name}');
$proc->addElement('Header',"//header[not(ancestor::*[@process='false'])]",'LHTML\Element\Custom\Header\{name}');
$proc->addElement('Main',"//main[not(ancestor::*[@process='false'])]",'LHTML\Element\Custom\Main\{name}');
$proc->addElement('Alert',"//alert[not(ancestor::*[@process='false'])]",'LHTML\Element\Custom\Partial\Alert');
$proc->addElement('Footer',"//footer[not(ancestor::*[@process='false'])]",'LHTML\Element\Custom\Footer\{name}');
$proc->addElement('Example',"//example[not(ancestor::*[@process='false'])]",'LHTML\Element\Custom\Example\{name}');

$proc->addMethod('beforeLoad','Execute before object data load');
$proc->addMethod('onLoad','Execute during object data load');
$proc->addMethod('afterLoad','Execute after object data loaded');
$proc->addMethod('beforeRender','Execute before object render');
$proc->addMethod('onRender','Execute during object render','RETURN_CALL');
$proc->addMethod('afterRender','Execute after object rendered');

$proc->parseBuffer();

$router = new Hoopless\Router();
$router->response();
