<html lang="en">
<head name="Standard">
    <title>Sign In</title>
</head>
<body>

<partial name="PageHeader"/>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="/auth/login">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="username" name="username"/>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" name="password"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn btn-primary float-right"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer name="Standard"/>
</body>
</html>

