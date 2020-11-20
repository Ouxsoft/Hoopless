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
<head name="Standard">
    <title>Bitwise</title>

    <script src="/assets/js/codemirror/codemirror.js"/>
    <script src="/assets/js/codemirror/xml.js"/>
    <link href="/assets/css/codemirror/codemirror.css" rel="stylesheet"/>
    <link href="/assets/css/codemirror/dracula.css" rel="stylesheet"/>

</head>
<body>

<header name="Standard"/>

<div class="container">
    <div class="row">
        <main name="Standard" class="editable">

            <h1>Example Element</h1>
            <p>The examples element is provided to demonstrate how to build custom elements.</p>

            <h2>Hello World</h2>

            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" data-toggle="tab" href="#code-3">Code</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#result-3">Results</a>
            </nav>
            <div class="tab-content border border-top-0 p-3 mb-3">
                <div id="code-3" class="tab-pane fade show active">
                    <code process="false">
                        <example name="HelloWorld"></example>
                    </code>
                </div>
                <div id="result-3" class="tab-pane fade">
                    <example name="HelloWorld"></example>
                </div>
            </div>


            <h2>BitWise Example</h2>
            <p>A bitwise example.</p>

            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" data-toggle="tab" href="#code-1">Code</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#result-1">Results</a>
            </nav>
            <div class="tab-content border border-top-0 p-3 mb-3">
                <div id="code-1" class="tab-pane fade show active">
                    <code process="false">
                        <example name="Bitwise">
                            <arg name="number">2</arg>
                            <arg name="count">6</arg>
                            <arg name="operator">^</arg>
                        </example>

                    </code>
                </div>
                <div id="result-1" class="tab-pane fade">
                    <example name="Bitwise">
                        <arg name="number">2</arg>
                        <arg name="count">6</arg>
                        <arg name="operator">^</arg>
                    </example>
                </div>
            </div>


            <h2>Header &amp; Footer</h2>

            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" data-toggle="tab" href="#code-4">Code</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#result-4">Results</a>
            </nav>
            <div class="tab-content border border-top-0 p-3 mb-3">
                <div id="code-4" class="tab-pane fade show active">
                    <code process="false">
                        <example name="Head"></example>
                        <h1>Your Site's Name</h1>
                        <example name="Footer"></example>
                    </code>
                </div>
                <div id="result-4" class="tab-pane fade">
                    <example name="Head"></example>
                    <h1>Your Site's Name</h1>
                    <example name="Footer"></example>
                </div>
            </div>



            <h2>WebView</h2>
            <p>React web view example.</p>

            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" data-toggle="tab" href="#code-2">Code</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#result-2">Results</a>
            </nav>
            <div class="tab-content border border-top-0 p-3 mb-3">
                <div id="code-2" class="tab-pane fade show active">
                    <code process="false">
                        <example name="ReactNativeWebView">
                            <arg name="initiate">true</arg>
                            <arg name="object">{"key": 123}</arg>
                            <h1>This is the body for webview</h1>
                        </example>
                    </code>
                </div>
                <div id="result-2" class="tab-pane fade">
                    <example name="ReactNativeWebView">
                        <arg name="initiate">true</arg>
                        <arg name="object">{"key": 123}</arg>
                        <h1>This is the body for webview</h1>
                    </example>
                </div>
            </div>

        </main>

        <nav name="SideMenu">
            <arg name="menu" type="string">help</arg>
            <nav name="QuickLinks" class="editable">

            </nav>
        </nav>
    </div>
</div>

<footer name="Standard"/>

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