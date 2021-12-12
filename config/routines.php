<?php

/**
 * PHPMarkup Routines Config
 *
 * This config contains instructions for processing PHPMarkup Routines.
 * @link https://github.com/Ouxsoft/LHTML#routines
 */

return [
    [
        'method' => 'beforeLoad',
        'description' => 'Execute before object data load'
    ],[
        'method' => 'onLoad',
        'description' => 'Execute during object data load'
    ],[
        'method' => 'afterLoad',
        'description' => 'Execute after object data loaded'
    ],[
        'method' => 'beforeRender',
        'description' => 'Execute before object render'
    ],[
        'method' => 'onRender',
        'description' => 'Execute during object render',
        'execute' => 'RETURN_CALL'
    ],[
        'method' => 'afterRender',
        'description' => 'Execute after object rendered'
    ]
];