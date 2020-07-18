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

    <h1>Variables</h1>
    LHTML allows variables to be passed to ancestor elements.

    <nav class="nav nav-tabs">
        <a class="nav-item nav-link active" data-toggle="tab" href="#code-1">Code</a>
        <a class="nav-item nav-link" data-toggle="tab" href="#result-1">Results</a>
    </nav>
    <div class="tab-content border border-top-0 p-3 mb-3">
        <div id="code-1" class="tab-pane fade show active">
            <code process="false">
                <example name="GroupProfile">
                    <fieldset>
                        <legend>Group:</legend>
                        <var name="group"/>

                        <example name="UserProfile">
                            <p>Welcome <var tag="block" name="first_name"/> <var name="last_name"/></p>
                        </example>
                    </fieldset>
                </example>
            </code>
        </div>
        <div id="result-1" class="tab-pane fade">
            <example name="GroupProfile">
                <fieldset>
                    <legend>Group:</legend>
                    <var name="group"/>

                    <example name="UserProfile">
                        <p>Welcome <var tag="block" name="first_name"/> <var name="last_name"/></p>
                    </example>
                </fieldset>
            </example>
        </div>
    </div>
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