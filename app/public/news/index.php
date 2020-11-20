<html lang="en">
<head name="Standard">
    <title>News</title>
</head>
<body>

<header name="Standard"/>

<div class="container">
    <div class="row">
        <main name="Standard" class="editable">
            <h1>News</h1>

            <alert type="info">
                Check out the latest stories from Ouxsoft.
            </alert>

            <partial name="News">
                <arg name="limit" type="int">4</arg>
            </partial>

        </main>

        <nav name="SideMenu">
            <arg name="menu" type="string">news</arg>
            <nav name="QuickLinks" class="editable">
                <arg name="menu" type="string">help</arg>
                <a href="https://github.com/ouxsoft/hoopless">
                    Hoopless
                </a>
                <a href="https://github.com/ouxsoft/LivingMarkup">
                    LivingMarkup
                </a>
                <a href="https://github.com/ouxsoft/LHTML">
                    LHTML Standard
                </a>
            </nav>
        </nav>
    </div>
</div>

<footer name="Standard"/>
</body>
</html>