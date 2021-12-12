<html lang="en">
<head name="Standard">
    <title>PHPMarkup</title>
</head>
<body>

<partial name="PageHeader"/>

<div class="container">
    <div class="row">
        <partial name="PageMainContent" class="editable">

            <h1>Partial Element</h1>
            <p>
                A partial is a fully-featured HTML Document fragment that is designed to be reused on other pages.
                Although other custom element types, such as Nav, Footer, and Headers, are technically partials, the
                partial's namespace is reserved for items that do not benefit from having their own root namespace.
            </p>
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