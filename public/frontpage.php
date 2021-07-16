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
                <a class="text-white" href="/news/">
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

    <h2>Latest <abbr title="Open-Source Software">OSS</abbr> Projects:</h2>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-12 col-md-8">
                <div class="card-body">
                    <h5 class="card-title">A CMS Built For the Team</h5>
                    <p class="card-text">
                        We wanted to make a content management system built around using a more expressive collaboration
                        language to empower web teams and communicate design.
                    </p>
                    <a href="/help/phpmarkup" class="btn btn-primary mb-4">
                        Learn More <span class="arrow-cta__icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-4 d-none d-lg-inline-block">
                <img src="/assets/images/hoopless/logo.png" alt="LuckByDice" class="m-2"/>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-12 col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Feeling Lucky?</h5>
                    <p class="card-text">
                        Check out our library for simulating luck based dice rolls from dice notations written in PHP.
                    </p>
                    <a href="https://github.com/Ouxsoft/LuckByDice" class="btn btn-primary">
                        Learn More <span class="arrow-cta__icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-4 d-none d-lg-inline-block">
                <img src="/assets/images/luckbydice/logo.png" alt="LuckByDice" class="m-3"/>
            </div>
        </div>
    </div>
</div>


<footer name="Standard"/>
</body>
</html>