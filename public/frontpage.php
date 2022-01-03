<partial name="Page">

    <partial name="PageHeader" tier="1"/>

    <div class="hero-feature w-100" style="background-image:url('/assets/images/dimension/1260x630/offset/0,-20/hero/blue-mountains.jpg');">

        <div class="container-fluid" style="max-width: 1276px;">
            <div class="hero-feature-outline">
                <div class="hero-feature-outline-left">
                    <h1 class="hero-feature-title display-5 fw-bold text-white">
                        Regulator Compliance
                    </h1>

                    <p class="lead text-white fw-bold ">
                        Assistance at its Best.
                    </p>

                </div>
            </div>
        </div>

        <aside class="info-box bg-primary p-4 d-none d-lg-block editable">
            <partial name="News">
                <arg name="limit" type="int">1</arg>
                <arg name="format">
                <span class="text-decoration-none fs-4">
                    A Better Spotlight on Safety<!-- {{ story.title }} -->
                </span>
                    <br/>
                    <a class="text-black-50 text-decoration-none" href="/news/">
                        <em><b>Learn</b> more <span class="arrow-cta__icon" aria-hidden="true"></span></em>
                    </a>
                </arg>
            </partial>
        </aside>
    </div>


    <partial name="PageContent">

            <h2 class="fw-bold">
                <b>Top</b> Services
            </h2>

            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/assets/images/dimension/500x300/offset/0,-20/jumbo/handshake.jpg" class="card-img-top" alt="decorative"/>
                            <h5 class="card-title">Safety Program Development</h5>
                            <p class="card-text">
                                We offer a wide range of safety programs that are unique to your facility and processes taking complex
                                regulatory actions into easy steps outlined for managers and employees. We will work with you to ensure that the safety program
                                fits your needs and meets all requirements from federal, state, local, or tribal.
                            </p>
                            <br/>
                            <a href="/help/phpmarkup" class="btn btn-secondary mb-4">
                                Learn More <span class="arrow-cta__icon" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/assets/images/dimension/500x300/offset/0,-20/jumbo/workstation.jpg" class="card-img-top" alt="decorative"/>
                            <h5 class="card-title">Flash Card Training</h5>
                            <p class="card-text">
                                For safety professionals who are looking at honing their knowledge or pass a certification exam.
                                We have over 2,000 custom flash cards sourced from users and safety professionals around the world.
                                These can be broken into a plethora of topics to help strengthen your weaknesses.
                            </p>
                            <br/>
                            <a href="https://github.com/Ouxsoft/LuckByDice" class="btn btn-secondary">
                                Learn More <span class="arrow-cta__icon" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/assets/images/dimension/500x300/offset/0,-20/jumbo/train-the-trainer.jpg" class="card-img-top" alt="decorative"/>
                            <h5 class="card-title">Training Content</h5>
                            <p class="card-text">
                                Need help updating or making training slides? Look no further, we offer training presentations that are written to match all regulatory requirements
                                with notes for the presenter and a demonstration video to help your confidence in hosting training onsite.
                            </p>
                            <br/>
                            <a href="https://github.com/Ouxsoft/LuckByDice" class="btn btn-secondary">
                                Learn More <span class="arrow-cta__icon" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
    </partial>


    <div class="jumbotron p-5 bg-dark rounded-3"  style="background-image:url('/assets/images/dimension/1260x630/offset/0,-20/jumbo/green-mountains.jpg');">
        <div class="container py-5 text-white">
            <h1 class="display-5 fw-bold">Don't go it alone.</h1>
            <p class="col-md-8 fs-4">
                Climb above the mountain of regulatory requirements.
            </p>
            <a class="btn btn-primary btn-lg" href="https://github.com/Ouxsoft" role="button">
                Schedule a Consultation
            </a>
        </div>
    </div>

    <partial name="PageFooter">
        <arg name="margin" type="bool">false</arg>
    </partial>
</partial>