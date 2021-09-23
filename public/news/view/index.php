<html lang="en">
<head name="Standard">
    <title>News</title>
</head>
<body>

<header name="Standard"/>

<div class="container">
    <div class="row">
        <main name="Standard" class="editable">

            <partial name="News">
                <arg name="id" type="int"><var name="id" source="get"/></arg>
                <arg name="limit" type="int">1</arg>
                <arg name="format">
                    <article class="mb-5">
                        <h1>{{title}}</h1>
                        <p class="text-muted">
                            <date>{{publish_date}}</date>
                        </p>
                        {{body}}
                    </article>
                </arg>
            </partial>

        </main>
    </div>
</div>

<footer name="Standard"/>
</body>
</html>
