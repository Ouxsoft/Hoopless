<html lang="en">
<head name="Standard">
    <title>Ouxsoft Home</title>
</head>
<body>

<header name="Standard">
    <arg type="bool" name="frontpage">true</arg>
</header>


<div class="hero-feature w-100" style="background-image:url('/assets/images/dimension/1260x630/offset/0,-20/gallery/teamwork.jpg');">

        <div class="container-fluid" style="max-width: 1276px;">
            <div class="hero-feature-outline">
                <div class="hero-feature-outline-left">
                    <h1 class="hero-feature-title display-5 fw-bold text-white">
                        You Are <br/>Welcome Here
                    </h1>

                    <p class="lead text-white fw-bold ">
                        It began with a batman commit now it's a cinch. <i class="fas fa-code fa-1x"></i>
                    </p>

                </div>
            </div>
        </div>

    <aside class="info-box bg-secondary shadow p-4 d-none d-lg-block editable">
        <partial name="News">
            <arg name="limit" type="int">1</arg>
            <arg name="format">
                <span class="text-white text-decoration-none fs-4">
                    {{ title }}
                </span>
                <br/>
                <a class="text-white text-decoration-none" href="/news/">
                    <em><b>Learn</b> more <span class="arrow-cta__icon" aria-hidden="true"></span></em>
                </a>
            </arg>
        </partial>
    </aside>
</div>


<div class="container mt-5">

    <h2 class="fw-bold">The <b>Latest</b> Products</h2>


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

<div class="jumbotron p-5 mt-5 bg-light rounded-3"  style="background-image:url('/assets/images/dimension/1260x630/offset/0,-20/hero/code.jpg');">
    <div class="container py-5 text-white">
        <h1 class="display-5 fw-bold">The world needs empowering software.</h1>
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