<html lang="en">
<head name="Standard">
    <title>Redacted</title>

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
            <h1>Redacted Element</h1>
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