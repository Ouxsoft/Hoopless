<html lang="en">
<head name="Standard">
    <title>Bitwise</title>

    <script src="/assets/js/codemirror/codemirror.js"/>
    <script src="/assets/js/codemirror/xml.js"/>
    <link href="/assets/css/codemirror/codemirror.css" rel="stylesheet"/>
    <link href="/assets/css/codemirror/dracula.css" rel="stylesheet"/>

</head>
<body>

<partial name="PageHeader"/>

<div class="container">
    <div class="row">
        <main name="Standard" class="editable">

            <h1>Head Element</h1>
            <p>
                The head section uses the head element. Passing arguments such as one off CSS and Javascript files is
                encouraged. Passing the title is also encouraged.
            </p>

            <h2>Standard</h2>
            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" data-toggle="tab" href="#code-2">Code</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#result-2">Results</a>
            </nav>
            <div class="tab-content border border-top-0 p-3 mb-3">
                <div id="code-2" class="tab-pane fade show active">
                    <code process="false">
                        <head name="Standard"/>
                    </code>
                </div>
                <div id="result-2" class="tab-pane fade">
                    <textarea class="w-100" style="min-height: 300px;">

                    <head name="Standard"/>

                    </textarea>
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