<?php

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {

    // loads routes from the PHP annotations of the controllers found in that directory
    $routes->import('../src/Controller/', 'annotation');

};