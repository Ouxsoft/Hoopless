<partial name="Page">

    <partial name="PageHeader" tier="2" title="My Account"
             image="/assets/images/dimension/800x300/offset/0,-20/gallery/developer.jpg"/>

    <partial name="PageContent">
        <partial name="PageMainContent">

            <div class="row">
                <div class="col-sm-12 col-md-6 align-self-center">
                    <form method="post" action="/session/signin">
                        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

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

    </partial>

    <partial name="PageFooter"/>
</partial>