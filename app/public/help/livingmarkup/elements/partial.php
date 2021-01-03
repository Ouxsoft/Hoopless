<html lang="en">
<head name="Standard">
    <title>LivingMarkup</title>
</head>
<body>

<header name="Standard"/>

<div class="container">
    <div class="row">
        <main name="Standard" class="editable">
            <h1>Partial Element</h1>
            <p>
                A partial is a fully-featured HTML Document fragment that is designed to be reused on other pages.
                Although other custom element types, such as Nav, Footer, and Headers, are technically partials, the
                partial's namespace is reserved for items that do not benefit from having their own root namespace.
            </p>
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