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
    <code  process="false">
        <p>Praesent ullamcorper eros nec neque luctus, sed sodales risus euismod. Proin consectetur elementum urna at
            feugiat.
            Vivamus porttitor vulputate orci id consequat. Phasellus ut dui sagittis, elementum ante a, rutrum velit.
            Duis
            mollis feugiat purus nec porttitor.
            <redact>
                Nulla tempor nunc et libero malesuada, mattis rutrum odio euismod. Proin commodo ligula luctus justo
                viverra feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut purus mollis,
                feugiat
                massa
                mollis, placerat purus.
            </redact>
            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas vitae
            bibendum libero. Sed lacus ex, ornare non ligula dignissim, tincidunt ultrices mauris. Aliquam ac facilisis
            magna.
            Vivamus blandit pretium finibus.
        </p>
    </code>
    Content echoed via PHP
    <code process="false">

        <redact>
            <p>Donec ultricies rutrum nulla, vitae tempor ex porttitor nec. Donec nec sem metus. Nunc leo magna,
                pulvinar
                non tellus vel, tincidunt consectetur sem. Nulla tempor mauris at quam imperdiet rutrum. Pellentesque
                habitant
                morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus at gravida sem. Quisque
                blandit,
                magna vel ultrices faucibus, felis elit rhoncus eros, vel tempus elit nulla non orci. Cras arcu elit,
                pellentesque sed mollis nec, porttitor ut est. Ut elit orci, fringilla et commodo sed, tincidunt
                vehicula
                nisl.
                Suspendisse vitae dolor eget tellus maximus ornare. Nulla non vestibulum est.</p>

            <p>
                Quisque mauris tortor, varius sit amet massa non, molestie congue dui. Nulla facilisi. Proin ac dolor
                fermentum
                nisi elementum maximus. Donec nec odio vitae magna ultricies luctus vel id diam. Suspendisse venenatis
                <b>congue
                    ultricies<?php echo 'PASSWORD'; ?></b>. Pellentesque non ex elementum, dapibus ipsum eu, feugiat
                arcu.
                Phasellus efficitur commodo ante vulputate aliquam. Sed posuere pulvinar quam, in elementum risus
                tristique
                a.
                Nullam dictum arcu eu mi lobortis, sodales tempor dolor fringilla. Nulla feugiat mollis nisl, non
                vulputate
                augue efficitur non. Nulla ac facilisis nisl, ac iaculis neque.
            </p>
        </redact>
    </code>

    Short phrases can be redacted:
    <code  process="false">

        <p>
            Pellentesque scelerisque pharetra justo quis gravida. Cras mattis dui eu finibus luctus. Mauris non
            condimentum
            purus. Suspendisse suscipit elementum nunc, a iaculis erat posuere vel. Quisque mattis gravida ipsum non
            tincidunt.
            Sed ut posuere justo. Ut elementum ullamcorper ligula, ac lacinia nibh facilisis nec. Donec eu suscipit
            risus.
            Sed
            arcu leo, ultrices id mollis ut, consectetur in lectus. Aenean a sollicitudin odio. Nam rhoncus mattis
            mauris et
            commodo. Cras fringilla, est eget volutpat facilisis, dolor mauris porttitor mi, eget ullamcorper eros
            lectus
            sit
            amet risus. Morbi vel magna eu odio auctor maximus sed ut ante. Maecenas commodo enim in
            <redact>dui feugiat</redact>
            sollicitudin.
        </p>
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
            mode: "xml",
            htmlMode: true,
            theme: "dracula"
        });
    });
</script>
</body>
</html>