<partial name="Page">

    <partial name="PageHeader" tier="1"/>

    <div class="hero-feature w-100" style="background-image:url('/assets/images/dimension/1260x630/offset/0,-20/gallery/teamwork.jpg');">

        <div class="container-fluid" style="max-width: 1276px;">
            <div class="hero-feature-outline">
                <div class="hero-feature-outline-left">
                    <h1 class="hero-feature-title display-5 fw-bold text-white">
                        Headline
                    </h1>

                    <p class="lead text-white fw-bold ">
                        Sub-headline
                    </p>

                </div>
            </div>
        </div>

        <aside class="info-box bg-primary shadow p-4 d-none d-lg-block editable">
            <partial name="News">
                <arg name="limit" type="int">1</arg>
                <arg name="format">
                <span class="text-white text-decoration-none fs-4">
                    {{ story.title }}
                </span>
                    <br/>
                    <a class="text-white text-decoration-none" href="/news/">
                        <em><b>Learn</b> more <span class="arrow-cta__icon" aria-hidden="true"></span></em>
                    </a>
                </arg>
            </partial>
        </aside>
    </div>


    <partial name="PageContent">
        <partial name="PageMainContent" class="editable">

            <h2 class="fw-bold">Placeholder Heading</h2>

            Add content here

            </div>
        </partial>
    </partial>


    <div class="jumbotron p-5 bg-dark rounded-3"  style="background-image:url('/assets/images/dimension/1260x630/offset/0,-20/hero/code.jpg');">
        <div class="container py-5 text-white">
            <h1 class="display-5 fw-bold">Call to action heading.</h1>
            <p class="col-md-8 fs-4">
                Call to action sub-heading
            </p>
            <a class="btn btn-primary btn-lg" href="https://github.com/Ouxsoft" role="button">
                <i class="fab fa-github fa"></i>
                Call to Action
            </a>
        </div>
    </div>

    <partial name="PageFooter">
        <arg name="margin" type="bool">false</arg>
    </partial>
</partial>