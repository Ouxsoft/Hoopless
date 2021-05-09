<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ouxsoft\Hoopless;

/**
 * Class Router
 * @package Hoopless
 */
class Router
{
    private $route;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->request();
    }

    /**
     * @param string $route
     */
    public function request()
    {
        $route = (array_key_exists('SCRIPT_NAME', $_SERVER))?$_SERVER['SCRIPT_NAME']:'';
        $route = (string) ltrim($route, '/');

        // send empty request to home
        if ($route == '' || $route == 'index.php') {
            $route = 'frontpage';
        }

        // check for file as php file if a extension not provided in request
        $path_info = pathinfo($route);

        if (!array_key_exists('extension', $path_info) || ($path_info['extension'] == '')) {
            $route .= '.php';
        }

        // check for directory traversal or if file does not exist
        $real_base = realpath(PUBLIC_DIR);
        $user_path = PUBLIC_DIR . $route;


        $real_user_path = realpath($user_path);

        if (($real_user_path === false)
            || (strpos($real_user_path, $real_base) !== 0)
            || (is_file($route) === false)
        ) {
            // return 404 page
            $route = '404.php';
        }

        $this->route = $route;
    }


    public function response()
    {
        require $this->route;
    }
}
