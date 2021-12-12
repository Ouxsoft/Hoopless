<html lang="en">
<head name="Standard">
    <title>News and Events</title>
</head>
<body>

<partial name="PageHeader">
    <arg name="title">News</arg>
    <arg name="tier" type="int">2</arg>
    <arg name="image">/assets/images/dimension/800x300/offset/0,-20/gallery/developer.jpg</arg>
</partial>

<div class="container">
    <div class="row">
        <partial name="PageMainContent" class="editable">

            <blockquote class="blockquote">
                Check out the latest stories from Ouxsoft.
            </blockquote>

            <div class="list-group">
                <partial name="News">
                    <arg name="limit" type="int">10</arg>
                    <arg name="format">
                        <a href="/news/{{ story.news_id }}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ story.title }}</h5>
                                <small>{{ story.publish_date }}</small>
                            </div>
                        </a>
                    </arg>
                </partial>
            </div>
        </partial>

        <partial name="PageSideBar">
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
        </partial>
    </div>
</div>

<footer name="Standard"/>
</body>
</html>
