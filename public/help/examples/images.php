<?php require 'vendor/autoload.php'; ?>

<!--
  ~ This file is part of the LivingMarkup package.
  ~
  ~ (c) Matthew Heroux <matthewheroux@gmail.com>
  ~
  ~ For the full copyright and license information, please view the LICENSE
  ~ file that was distributed with this source code.
  -->

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
        <h1>Images</h1>
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
                    <img src="/assets/images/height/50/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                    <!-- resize by width -->
                    <img src="/assets/images/width/50/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                    <!-- resize by width and height -->
                    <img src="/assets/images/width/50/height/50/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                    <!-- resize by width and height using dimension parameter -->
                    <img src="/assets/images/dimension/50x50/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                </code>
            </div>
            <div id="result-1" class="tab-pane fade">
                <!-- resize by height -->
                <img src="/assets/images/height/50/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                <!-- resize by width -->
                <img src="/assets/images/width/50/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                <!-- resize by width and height -->
                <img src="/assets/images/width/50/height/50/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                <!-- resize by width and height using dimension parameter -->
                <img src="/assets/images/dimension/50x50/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
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
                    <img src="/assets/images/dimension/50x50/offset/0,0/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                    <!-- left -->
                    <img src="/assets/images/dimension/50x50/offset/-50,0/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                    <!-- right -->
                    <img src="/assets/images/dimension/50x50/offset/50,0/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                    <!-- top -->
                    <img src="/assets/images/dimension/50x50/offset/0,-50/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                    <!-- bottom -->
                    <img src="/assets/images/dimension/50x50/offset/0,50/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                </code>
            </div>
            <div id="result-2" class="tab-pane fade">
                <!-- center -->
                <img src="/assets/images/dimension/50x50/offset/0,0/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                <!-- left -->
                <img src="/assets/images/dimension/50x50/offset/-50,0/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                <!-- right -->
                <img src="/assets/images/dimension/50x50/offset/50,0/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                <!-- top -->
                <img src="/assets/images/dimension/50x50/offset/0,-50/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
                <!-- bottom -->
                <img src="/assets/images/dimension/50x50/offset/0,50/livingmarkup/logo/original.jpg" alt="LivingMarkup" />
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