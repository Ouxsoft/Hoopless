<html lang="en">
<head name="Standard">
    <title>News</title>
</head>
<body>


<partial name="PageHeader"/>


<div class="container">
    <div class="row">
        <partial name="PageMainContent">

            <partial name="News">
                <arg name="id" type="int"><var name="id" source="get"/></arg>
                <arg name="limit" type="int">1</arg>
                <arg name="format">
                    <article class="mb-5">
                        <h1>{{story.title}}</h1>
                        <p class="text-muted">
                            <date>{{story.publish_date}}</date>
                        </p>
                        {{story.body|raw}}
                    </article>
                </arg>
            </partial>
            
        </partial>
    </div>
</div>

<footer name="Standard"/>
</body>
</html>
