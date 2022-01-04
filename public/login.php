<partial name="Page">

    <partial name="PageHeader" tier="2" title="My Account"
             image="/assets/images/dimension/800x300/offset/0,-20/gallery/developer.jpg"/>

    <partial name="PageContent">
        <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-6">
                        <form method="post" action="/session/signin">
                            <h1 class="h3 mb-3 fw-normal">Sign in to <var name="site_name" source="global"/></h1>

                            <div class="form-floating">
                                <input type="email" class="form-control" id="floatingInput" name="username" placeholder="name@example.com"/>
                                <label for="floatingInput" autocomplete="false">Email address</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password"/>
                                <label for="floatingPassword" autocomplete="false">Password</label>
                            </div>

                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember-me"/> Remember me
                                </label>
                            </div>

                            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

                        </form>

                    </div>


        </div>


    </partial>

    <partial name="PageFooter"/>
</partial>