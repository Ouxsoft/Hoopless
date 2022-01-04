<?php

/**
 * PHPMarkup Elements Config
 *
 * This config contains instructions for processing PHPMarkup Elements.
 * @link https://github.com/Ouxsoft/LHTML#element-types
 */
return [
    /**
     * Code
     *
     * skip elements with ancestors with the attribute process="false"
     * e.g.
     *  skip: <html process="false><code></code></html>
     */
    [
        "name" => "Code",
        "xpath" => "//code[not(ancestor::*[@process='false'])]",
        "class_name" => App\Element\Widget\Code::class
    ],

    /**
     * If Statement
     *
     * skip elements with ancestors with the attribute process="false"
     * e.g.
     *  skip: <html process="false><if></if></html>
     */
    [
        "name" => "If Statement",
        "xpath" => "//if[not(ancestor::*[@process='false'])]",
        "class_name" => App\Element\IfStatement::class
    ],

    /**
     * Variable
     *
     * skip elements with ancestors with the attribute process="false"
     * e.g.
     *  skip: <html process="false><var></var></html>
     */
    [
        "name" => "Variable",
        "xpath" => "//var[not(ancestor::*[@process='false'])]",
        "class_name" => App\Element\Variable::class
    ],

    /**
     * Hyperlink
     *
     * skip elements with ancestors with the attribute process="false"
     * e.g.
     *  skip: <html process="false><a></a></html>
     */
    [
        "name" => "Hyperlink",
        "xpath" => "//a[not(ancestor::*[@process='false']|ancestor::arg)]",
        "class_name" => App\Element\Hyperlink::class
    ],

    /**
     * Redact
     *
     * skip elements with ancestors with the attribute process="false"
     * e.g.
     *  skip: <html process="false><redact></redact></html>
     */
    [
        "name" => "Redact",
        "xpath" => "//redact[not(ancestor::*[@process='false'])]",
        "class_name" => App\Element\Redact::class
    ],

    /**
     * Block
     *
     * skip elements with ancestors with the attribute process="false"
     * e.g.
     *  skip: <html process="false><block></block></html>
     */
    [
        "name" => "Block[not(ancestor::*[@process='false'])]",
        "xpath" => "//block[not(ancestor::*[@process='false'])]",
        "class_name" => "App\Element\Blocks\{name}"
    ],

    /**
     * Partial
     *
     * skip elements with ancestors with the attribute process="false"
     * e.g.
     *  skip: <html process="false><partial></partial></html>
     */
    [
        "name" => "Partial",
        "xpath" => "//partial[not(ancestor::*[@process='false'])]",
        "class_name" => "App\Element\Partial\{name}"
    ],

    /**
     * Widget
     *
     * skip elements with ancestors with the attribute process="false"
     * e.g.
     *  skip: <html process="false><widget></widget</html>
     */
    [
        "name" => "Widget",
        "xpath" => "//widget[not(ancestor::*[@process='false'])]",
        "class_name" => "App\Element\Widget\{name}",
        "cache_duration" => "1 hour",
        "search_index" => false
    ],

    /**
     * Alert
     *
     * skip elements with ancestors with the attribute process="false"
     * e.g.
     *  skip: <html process="false><alert></alert></html>
     */
    [
        "name" => "Alert",
        "xpath" => "//alert[not(ancestor::*[@process='false'])]",
        "class_name" => App\Element\Partial\Alert::class
    ],

];
