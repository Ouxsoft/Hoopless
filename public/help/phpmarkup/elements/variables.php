<html lang="en">
<head name="Standard">
    <title>If Statement</title>

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

            <h1>Variable Element</h1>
            LHTML allows child elements to access ancestor elements public variables.

            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" data-toggle="tab" href="#code-1">Code</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#result-1">Results</a>
            </nav>
            <div class="tab-content border border-top-0 p-3 mb-3">
                <div id="code-1" class="tab-pane fade show active">
                    <code process="false">
                        <example name="GroupProfile">
                            <fieldset>
                                <legend>Group: <var name="group"/></legend>

                                <example name="UserProfile">
                                    <p>Welcome <var tag="example" name="first_name"/> <var name="last_name"/></p>
                                </example>
                            </fieldset>
                        </example>
                    </code>
                </div>
                <div id="result-1" class="tab-pane fade">
                    <example name="GroupProfile">
                        <fieldset>
                            <legend>Group: <var name="group"/></legend>

                            <example name="UserProfile">
                                <p>Welcome <var tag="example" name="first_name"/> <var name="last_name"/></p>
                            </example>
                        </fieldset>
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