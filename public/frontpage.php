<html lang="en">
<head name="Standard">
    <title>Ouxsoft Home</title>
</head>
<body>

<header name="Standard">
    <arg type="bool" name="frontpage">true</arg>
</header>

<div class="hero-image w-100 mb-5" style="background-image:url('/assets/images/dimension/1260x630/offset/0,-20/hero/code.jpg');">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-left text-light">
                <h1 class="font-weight-light">
                    <span class="fs-1">Collaborating Design</span> <i class="fas fa-code fa-1x"></i> <br/>
                    Made To Empowering Teams
                </h1>
                <p class="lead">Extending features to the web team.</p>
            </div>
        </div>
    </div>
    <aside class="info-box bg-secondary shadow p-4 editable">
        <partial name="News">
            <arg name="limit" type="int">1</arg>
            <arg name="format">
                <span class="text-white text-decoration-none fs-4">
                    {{ title }}
                </span>
                <br/>
                <a class="text-white text-decoration-none" href="/news/">
                    <em>Learn more <span class="arrow-cta__icon" aria-hidden="true"></span></em>
                </a>
            </arg>
        </partial>
    </aside>
</div>

<div class="container">

    <h2 class="fw-bold">The <b>Latest</b> <abbr title="Open-Source Software">OSS</abbr> Projects:</h2>

    <div class="row gx-5">
        <div class="p-3 col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">A CMS Built For the Team</h5>
                    <p class="card-text">
                        We wanted to make a content management system built around using a more expressive collaboration
                        language to empower web teams and communicate design.
                    </p>
                    <img src="/assets/images/hoopless/logo.png" alt="PHPMarkup"/>
                    <br/>
                    <br/>
                    <a href="/help/phpmarkup" class="btn btn-primary mb-4">
                        Learn More <span class="arrow-cta__icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>

        <div class="p-3 col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Feeling Lucky?</h5>
                    <p class="card-text">
                        Check out our library for simulating luck based dice rolls from dice notations written in PHP.
                    </p>
                    <img src="/assets/images/luckbydice/logo.png" alt="LuckByDice"/>
                    <br/>
                    <br/>
                    <a href="https://github.com/Ouxsoft/LuckByDice" class="btn btn-primary">
                        Learn More <span class="arrow-cta__icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="p-5 mt-5 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">The world needs empowering software that works.</h1>
        <p class="col-md-8 fs-4">
            We're bringing it to life.
        </p>
        <a class="btn btn-primary btn-lg" href="https://github.com/Ouxsoft" role="button">
            <i class="fab fa-github fa"></i>
            BECOME A OUXSOFTER.
        </a>
    </div>
</div>


<footer name="Standard"/>
</body>
</html>