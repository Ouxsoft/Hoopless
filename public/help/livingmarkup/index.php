<html lang="en">
<head name="Standard">
    <title>LivingMarkup</title>
</head>
<body>

<header name="Standard"/>

<div class="container">
    <div class="row">
        <main name="Standard" class="editable">
            <h1>LivingMarkup</h1>

            <p>Editors can use dynamic markup in maintaining pages. This is due to pages being written in an HTML templating engine language called <a href="https://github.com/ouxsoft/LHTML">LHTML</a>, which is processed via the <a href="https://github.com/ouxsoft/LivingMarkup">LivingMarkup</a> engine.</p>

            <h2>LHTML Elements</h2>

            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <th>Tag</th>
                    <th>Type</th>
                </tr>
                <tr>
                    <td><a href="elements/code">Code</a></td>
                    <td>&lt;code&gt;</td>
                    <td>Core</td>
                </tr>
                <tr>
                    <td><a href="elements/examples">Examples</a></td>
                    <td>&lt;example&gt;</td>
                    <td>Custom</td>
                </tr>
                <tr>
                    <td><a href="elements/footer">Footer</a></td>
                    <td>&lt;footer&gt;</td>
                    <td>Custom</td>
                </tr>
                <tr>
                    <td><a href="elements/head">Head</a></td>
                    <td>&lt;head&gt;</td>
                    <td>Custom</td>
                </tr>
                <tr>
                    <td><a href="elements/header">Header</a></td>
                    <td>&lt;header&gt;</td>
                    <td>Custom</td>
                </tr>
                <tr>
                    <td><a href="elements/if-statement">If Statement</a></td>
                    <td>&lt;if&gt;</td>
                    <td>Core</td>
                </tr>
                <tr>
                    <td><a href="elements/images">Images</a></td>
                    <td>&lt;img&gt;</td>
                    <td>Core</td>
                </tr>
                <tr>
                    <td><a href="elements/main">Main</a></td>
                    <td>&lt;main&gt;</td>
                    <td>Custom</td>
                </tr>
                <tr>
                    <td><a href="elements/nav">Navigation</a></td>
                    <td>&lt;nav&gt;</td>
                    <td>Custom</td>
                </tr>
                <tr>
                    <td><a href="elements/partial">Partial</a></td>
                    <td>&lt;partial&gt;</td>
                    <td>Custom</td>
                </tr>
                <tr>
                    <td><a href="elements/redact">Redact</a></td>
                    <td>&lt;redact&gt;</td>
                    <td>Core</td>
                </tr>
                <tr>
                    <td><a href="elements/variables">Variables</a></td>
                    <td>&lt;var&gt;</td>
                    <td>Core</td>
                </tr>
            </table>
            <p>
                Custom elements are those that should be edited as part of the site's design. They are populated
                initially to allow developers to more rapidly develop new web sites.
            </p>
            <p>
                Core elements should not be edited. They are designed to be used across multiple sites and are
                updated with new releases.
            </p>

            <h2>Turn off</h2>
            <p>LHTML is not processed when an ancestor features an attribute process="false".</p>

        </main>

        <nav name="SideMenu">
            <arg name="menu" type="string">help</arg>
            <nav name="QuickLinks" class="editable">
            </nav>
        </nav>
    </div>
</div>

<footer name="Standard"/>
</body>
</html>