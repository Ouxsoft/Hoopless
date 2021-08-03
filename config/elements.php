<?php

/**
 * PHPMarkup Elements Config
 * 
 * This config contains instructions for processing PHPMarkup Elements.
 * @link https://github.com/Ouxsoft/LHTML#element-types
 */
return [
    [
      "name" => "Code",
      "xpath" => "//code[not(ancestor::*[@process='false'])]",
      "class_name" => App\Element\Core\Code::class
    ],
    [
      "name" => "If Statement",
      "xpath" => "//if[not(ancestor::*[@process='false'])]",
      "class_name" => App\Element\Core\IfStatement::class
    ],
    [
      "name" => "Variable",
      "xpath" => "//var[not(ancestor::*[@process='false'])]",
      "class_name" => App\Element\Core\Variable::class
    ],
    [
      "name" => "Hyperlink",
      "xpath" => "//a[not(ancestor::*[@process='false']|ancestor::arg)]",
      "class_name" => App\Element\Core\Hyperlink::class
    ],
    [
      "name" => "Redact",
      "xpath" => "//redact[not(ancestor::*[@process='false'])]",
      "class_name" => App\Element\Core\Redact::class
    ],
    [
      "name" => "Block[not(ancestor::*[@process='false'])]",
      "xpath" => "//block[not(ancestor::*[@process='false'])]",
      "class_name" => "App\Element\Custom\Blocks\{name}"
    ],
    [
      "name" => "Partial",
      "xpath" => "//partial[not(ancestor::*[@process='false'])]",
      "class_name" => "App\Element\Custom\Partial\{name}"
    ],
    [
      "name" => "Widget",
      "xpath" => "//widget[not(ancestor::*[@process='false'])]",
      "class_name" => "App\Element\Custom\Widget\{name}",
      "cache_duration" => "1 hour",
      "search_index" => false
    ],
    [
      "name" => "Nav",
      "xpath" => "//nav[not(ancestor::*[@process='false']|ancestor::main)]",
      "class_name" => "App\Element\Custom\Nav\{name}"
    ],
    [
      "name" => "Head",
      "xpath" => "//head[not(ancestor::*[@process='false'])]",
      "class_name" => 'App\Element\Custom\Head\{name}'
    ],
    [
      "name" => "Header",
      "xpath" => "//header[not(ancestor::*[@process='false'])]",
      "class_name" => "App\Element\Custom\Header\{name}"
    ],
    [
      "name" => "Main",
      "xpath" => "//main[not(ancestor::*[@process='false'])]",
      "class_name" => "App\Element\Custom\Main\{name}"
    ],
    [
      "name" => "Alert",
      "xpath" => "//alert[not(ancestor::*[@process='false'])]",
      "class_name" => App\Element\Custom\Partial\Alert::class
    ],
    [
      "name" => "Footer",
      "xpath" => "//footer[not(ancestor::*[@process='false'])]",
      "class_name" => "App\Element\Custom\Footer\{name}"
    ],
    [
      "name" => "Example",
      "xpath" => "//example[not(ancestor::*[@process='false'])]",
      "class_name" => "App\Element\Custom\Example\{name}"
    ]
];
