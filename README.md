<p align="center">
<img src="https://raw.githubusercontent.com/Ouxsoft/Hoopless/master/app/assets/images/hoopless/logo.png" alt="Hoopless">
</p>

<p align="center">
    <img alt="GitHub release (latest by date)" src="https://img.shields.io/github/v/release/Ouxsoft/hoopless">
    <a href="https://app.codacy.com/gh/Ouxsoft/Hoopless?utm_source=github.com&utm_medium=referral&utm_content=Ouxsoft/Hoopless&utm_campaign=Badge_Grade_Dashboard">
    <img alt="Codacy grade" src="https://api.codacy.com/project/badge/Grade/af61c01e07894689b9be009591e6b3b1">
    </a>
    <img alt="GitHub commit activity" src="https://img.shields.io/github/commit-activity/y/Ouxsoft/hoopless">
</p>


## About

A modular content management system using a markup abstraction layer.

```
<html lang="en">
<head name="Standard">
    <title>Title</title>
</head>
<body>

<header name="Standard"/>

<div class="container">
    <div class="row">
        <main name="Standard" class="editable">
            <h2>Title</h2>
            <p>
                Placeholder paragraph
            </p>

        </main>

        <nav name="SideMenu">
            <nav name="QuickLinks" class="editable">
                <a href="#">Quicklink 1</a>
                <a href="#">Quicklink 2</a>
            </nav>
        </nav>
    </div>
</div>

<footer name="Standard"/>
</body>
</html>
```

## Installation

Install with [Git](https://git-scm.com/):
```shell script
git clone git@github.com:Ouxsoft/Hoopless.git
```

Start local development stack using [Docker](https://docs.docker.com/get-docker/).

```shell script
./stack start
```

View in web browser:

|  | URL | Username | Password
| :--- | :--- | :--- | :--- |
| Website | [http://localhost](http://localhost) | | |
| Database | [http://db.localhost](http://db.localhost) | | |
| Continuous Deployment | [http://cd.localhost/blue](http://cd.localhost/blue) | admin | admin |

### Via Shell
Start on production Ubuntu 18.04 server
```shell script
./stack install prod
```

## Creators

***Matthew Heroux***

  * [https://github.com/hxtree](https://github.com/hxtree)