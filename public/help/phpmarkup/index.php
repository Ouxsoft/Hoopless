<html lang="en">
<head name="Standard">
    <title>PHPMarkup</title>
</head>
<body>

<partial name="PageHeader"/>

<div class="container">
    <div class="row">
        <partial name="PageMainContent" class="editable">
            <h1>PHPMarkup</h1>

            <p>Editors can use dynamic markup in maintaining pages. This is due to pages being written in an HTML templating engine language called <a href="https://github.com/Ouxsoft/LHTML">LHTML</a>, which is processed via the <a href="https://github.com/Ouxsoft/PHPMarkup">PHPMarkup</a> engine.</p>

            <h2>LHTML Elements</h2>

            <table class="table table-striped">
                <tr>
                    <th>Element</th>
                    <th>Tag</th>
                </tr>
                <tr>
                    <td><a href="/help/phpmarkup/elements/code">Code</a></td>
                    <td>&lt;code&gt;</td>
                </tr>
                <tr>
                    <td><a href="/help/phpmarkup/elements/examples">Examples</a></td>
                    <td>&lt;example&gt;</td>
                </tr>
                <tr>
                    <td><a href="/help/phpmarkup/elements/footer">Footer</a></td>
                    <td>&lt;footer&gt;</td>
                </tr>
                <tr>
                    <td><a href="/help/phpmarkup/elements/head">Head</a></td>
                    <td>&lt;head&gt;</td>
                </tr>
                <tr>
                    <td><a href="/help/phpmarkup/elements/if-statement">If Statement</a></td>
                    <td>&lt;if&gt;</td>
                </tr>
                <tr>
                    <td><a href="/help/phpmarkup/elements/images">Images</a></td>
                    <td>&lt;img&gt;</td>
                </tr>
                <tr>
                    <td><a href="/help/phpmarkup/elements/nav">Navigation</a></td>
                    <td>&lt;nav&gt;</td>
                </tr>
                <tr>
                    <td><a href="/help/phpmarkup/elements/partial">Partial</a></td>
                    <td>&lt;partial&gt;</td>
                </tr>
                <tr>
                    <td><a href="/help/phpmarkup/elements/redact">Redact</a></td>
                    <td>&lt;redact&gt;</td>
                </tr>
                <tr>
                    <td><a href="/help/phpmarkup/elements/variables">Variables</a></td>
                    <td>&lt;var&gt;</td>
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

        </partial>


        <partial name="PageSideBar">
            <partial name="PageSideBarMenu" menu_id="2"/>

            <nav name="QuickLinks" class="editable">
            </nav>
        </partial>
    </div>
</div>

<footer name="Standard"/>
</body>
</html>