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

        </main>

        <nav name="SideMenu">
            <arg name="menu" type="string">news</arg>
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
