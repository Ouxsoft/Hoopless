<html lang="en">
<head name="Standard">
    <title>Ouxsoft Home</title>
</head>
<body>

<header name="Standard">
    <arg type="bool" name="frontpage">true</arg>
</header>

<div class="hero-image w-100 mb-5" style="background-image:url('/assets/images/dimension/1260x630/offset/0,-20/hero/pattern-bg.jpg');">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-left text-light">
                <h1 class="font-weight-light">
                    We make software for tomorrow by breaking the assumptions of today.
                </h1>
                <p class="lead"><i class="fas fa-code fa-1x"></i> Empowering collaborators through software engineering.</p>
            </div>
        </div>
    </div>
    <aside class="info-box bg-secondary p-4 editable">
        <partial name="News">
            <arg name="limit" type="int">1</arg>
            <arg name="format">
                <a class="text-white" href="{{url}}">
                    {{ title }}
                    <br/>
                    <small>
                        <em>Learn more <span class="arrow-cta__icon" aria-hidden="true"></span></em>
                    </small>
                </a>
            </arg>
        </partial>
    </aside>
</div>

<div class="container">
    <p>
        We are building <a href="https://github.com/Ouxsoft/Hoopless">Hoopless</a> the content management system
        powering this site.
        The goal of Hoopless is to create a more expressive markup language to empower web teams and communicate design.
    </p>
    <a href="/help/phpmarkup" class="btn btn-primary" >
        Learn More <span class="arrow-cta__icon" aria-hidden="true"></span>
    </a>
</div>


<footer name="Standard"/>
</body>
</html>