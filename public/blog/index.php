<html lang="en">
<head name="Standard">
    <title>Blogs</title>
</head>
<body>

<partial name="PageHeader">
    <arg name="title">Blogs</arg>
    <arg name="tier" type="int">2</arg>
    <arg name="image">/assets/images/dimension/800x300/offset/0,-20/gallery/developer.jpg</arg>
</partial>

<div class="container">
    <div class="row">
        <main name="Standard" class="editable">

            <blockquote class="blockquote">
                Check out the latest stories from Ouxsoft.
            </blockquote>

            <div class="list-group">
                <partial name="Blog">
                    <arg name="limit" type="int">10</arg>
                    <arg name="format">
                        <a href="/blog/{{blog.blog_id}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ blog.title}}</h5>
                                <small>{{ blog.publish_date}}</small>
                            </div>
                        </a>
                    </arg>
                </partial>
            </div>

        </main>

        <nav name="SideMenu">
            <arg name="menu" type="string">blog</arg>
            <nav name="QuickLinks" class="editable">
                <arg name="menu" type="string">help</arg>
                <a href="https://www.scrumalliance.org/">
                    ScrumAlliance
                </a>
            </nav>
        </nav>
    </div>
</div>

<footer name="Standard"/>
</body>
</html>