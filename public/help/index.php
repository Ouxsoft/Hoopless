<html lang="en">
<head name="Standard">
    <title>Help</title>
</head>
<body>

<partial name="PageHeader">
    <arg name="title">Help</arg>
    <arg name="tier" type="int">2</arg>
    <arg name="image">/assets/images/dimension/800x300/offset/0,-20/gallery/developer.jpg</arg>
    <arg name="menu_id">1</arg>
</partial>

<div class="container">
    <div class="row">
        <main name="Standard" class="editable">
            <h2>Editing Guide</h2>
            <p class="lead">
                Hoopless is the content management system (CMS) used manage this website.
            </p>

            <h3>PHPMarkup Pages</h3>
            <p>
                To provide the best expereince for our web editors and users our pages are dynamically maintained
                using PHPMarkup. <a href="/help/phpmarkup">Learn more</a>.
            </p>

            <h3>Bootstrap CSS Framework</h3>
            <p>
               Bootstrap CSS framework is used to make this site responsive and mobile-first sites. Learn about the
               Bootstrap CSS classes available via the <a href=" https://getbootstrap.com/docs/">official website</a>.
            </p>

            <h3>Accessibility Guidelines</h3>
            <p>Editors must adhere to the <a href="https://www.w3.org/WAI/WCAG20/glance/">WCAG 2.0 Accessibility
                    standards</a> when editing this website to help ensure the information presented remains
                perceivable, operable, and understandable to all.</p>
        </main>

        <nav name="SideMenu">
            <nav name="QuickLinks" class="editable">
                <arg name="menu" type="string">help</arg>
                <a href="https://github.com/Ouxsoft/hoopless">
                    Hoopless
                </a>
                <a href="https://github.com/Ouxsoft/PHPMarkup">
                    PHPMarkup
                </a>
                <a href="https://github.com/Ouxsoft/LHTML">
                    LHTML Standard
                </a>
            </nav>
        </nav>
    </div>
</div>

<footer name="Standard"/>
</body>
</html>