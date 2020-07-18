<?php require 'vendor/autoload.php'; ?>

<html lang="en">
<head>
    <title>If Statement</title>
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
    <h1>Redacted</h1>
    Whole paragraphs can be redacted:

    <nav class="nav nav-tabs">
        <a class="nav-item nav-link active" data-toggle="tab" href="#code-1">Code</a>
        <a class="nav-item nav-link" data-toggle="tab" href="#result-1">Results</a>
    </nav>
    <div class="tab-content border border-top-0 p-3 mb-3">
        <div id="code-1" class="tab-pane fade show active">
            <code process="false">
                <p>Praesent ullamcorper eros nec neque luctus, sed sodales risus euismod. Proin consectetur elementum urna at
                feugiat.
                Vivamus porttitor <redact>vulputate orci<?php echo 'password';?></redact> id consequat. Phasellus ut dui sagittis, elementum ante a, rutrum velit.
                Duis
                mollis feugiat purus nec porttitor.</p>
                <p><redact>
                Nulla tempor nunc et libero malesuada, mattis rutrum odio euismod. Proin commodo ligula luctus justo
                mollis, placerat purus.
                </redact></p>
            </code>
        </div>
        <div id="result-1" class="tab-pane fade">
            <p>Praesent ullamcorper eros nec neque luctus, sed sodales risus euismod. Proin consectetur elementum urna at
                feugiat.
                Vivamus porttitor <redact>vulputate orci<?php echo 'password';?></redact> id consequat. Phasellus ut dui sagittis, elementum ante a, rutrum velit.
                Duis
                mollis feugiat purus nec porttitor.</p>
            <p><redact>
                    Nulla tempor nunc et libero malesuada, mattis rutrum odio euismod. Proin commodo ligula luctus justo
                    mollis, placerat purus.
                </redact></p>
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
            mode: "xml",
            htmlMode: true,
            theme: "dracula"
        });
    });
</script>
</body>
</html>