<html lang="en">
<head name="Standard">
    <title>Images</title>

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

            <h1>Images Element</h1>
            <p>
                Images can be automatically resized for your need. Simply upload large images and have them resized on the fly.
            </p>
            <h2>Parameters</h2>
            <p>Local images with parameters inside the request are automatically adjusted and cached.</p>
            <h3>Resizing Image</h3>
            <p>Images can be resized on the fly using parameterized requests</p>

            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" data-toggle="tab" href="#code-1">Code</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#result-1">Results</a>
            </nav>
            <div class="tab-content border border-top-0 p-3 mb-3">
                <div id="code-1" class="tab-pane fade show active">
                    <code process="false">
                        <!-- resize by height -->
                        <img src="/assets/images/height/50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                        <!-- resize by width -->
                        <img src="/assets/images/width/50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                        <!-- resize by width and height -->
                        <img src="/assets/images/width/50/height/50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                        <!-- resize by width and height using dimension parameter -->
                        <img src="/assets/images/dimension/50x50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                    </code>
                </div>
                <div id="result-1" class="tab-pane fade">
                    <!-- resize by height -->
                    <img src="/assets/images/height/50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                    <!-- resize by width -->
                    <img src="/assets/images/width/50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                    <!-- resize by width and height -->
                    <img src="/assets/images/width/50/height/50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                    <!-- resize by width and height using dimension parameter -->
                    <img src="/assets/images/dimension/50x50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                </div>
            </div>


            <h3>Offset</h3>
            <p>
                Set the focal point of an image using offsets. The syntax is X%,Y% with values ranging from -50 to 50 with 0 being center.
            </p>
            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" data-toggle="tab" href="#code-2">Code</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#result-2">Results</a>
            </nav>
            <div class="tab-content border border-top-0 p-3 mb-3">
                <div id="code-2" class="tab-pane fade show active">
                    <code process="false">
                        <!-- center -->
                        <img src="/assets/images/dimension/50x50/offset/0,0/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                        <!-- left -->
                        <img src="/assets/images/dimension/50x50/offset/-50,0/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                        <!-- right -->
                        <img src="/assets/images/dimension/50x50/offset/50,0/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                        <!-- top -->
                        <img src="/assets/images/dimension/50x50/offset/0,-50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                        <!-- bottom -->
                        <img src="/assets/images/dimension/50x50/offset/0,50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                    </code>
                </div>
                <div id="result-2" class="tab-pane fade">
                    <!-- center -->
                    <img src="/assets/images/dimension/50x50/offset/0,0/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                    <!-- left -->
                    <img src="/assets/images/dimension/50x50/offset/-50,0/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                    <!-- right -->
                    <img src="/assets/images/dimension/50x50/offset/50,0/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                    <!-- top -->
                    <img src="/assets/images/dimension/50x50/offset/0,-50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                    <!-- bottom -->
                    <img src="/assets/images/dimension/50x50/offset/0,50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
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