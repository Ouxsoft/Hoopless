<?php require 'vendor/autoload.php';
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

?>
<html lang="en">
<head>
    <title>Variables</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="/assets/css/main.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/codemirror/codemirror.css"/>
    <script src="/assets/js/codemirror/codemirror.js"/>
    <script src="/assets/js/codemirror/xml.js"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/codemirror/dracula.css"/>
</head>
<body>


<partial name="Header\Standard"/>

<main role="main" class="container">
<h1>Bitwise</h1>
    <code process="false">

    <example name="ReactNativeWebView">
        <arg name="initiate">true</arg>
        <arg name="object">{"key": 123}</arg>
        <h1>This is the body for webview</h1>
    </example>
</code>
</main>

<partial name="Footer\Standard"/>

<script>
    function qsa(sel) {
        return Array.apply(null, document.querySelectorAll(sel));
    }
    qsa(".codemirror-textarea").forEach(function (editorEl) {
        CodeMirror.fromTextArea(editorEl, {
            lineNumbers: true,
            styleActiveLine: true,
            matchBrackets: true,
            mode : "xml",
            htmlMode: true,
            theme: "dracula"
        });
    });
</script>
</body>
</html>
