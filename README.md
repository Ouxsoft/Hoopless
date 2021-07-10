<p align="center">
    <img src="https://raw.githubusercontent.com/Ouxsoft/Hoopless/master/assets/images/hoopless/logo.png" alt="Hoopless">
</p>

<p align="center">
    <img alt="GitHub release (latest by date)" src="https://img.shields.io/github/v/release/Ouxsoft/hoopless">
    <a href="#tada-php-support" title="PHP Versions Supported">
            <img alt="PHP Versions Supported" src="https://img.shields.io/badge/php-7.3%20to%208.0-777bb3.svg?logo=php&logoColor=white&labelColor=555555">
        </a>      
    <a href="https://app.codacy.com/gh/Ouxsoft/Hoopless?utm_source=github.com&utm_medium=referral&utm_content=Ouxsoft/Hoopless&utm_campaign=Badge_Grade_Dashboard">
        <img alt="Codacy grade" src="https://api.codacy.com/project/badge/Grade/af61c01e07894689b9be009591e6b3b1">
    </a>
    <img alt="GitHub commit activity" src="https://img.shields.io/github/commit-activity/y/Ouxsoft/hoopless">
</p>

## About

A modular content management system featuring a markup abstraction layer, object–relational mapping, and templating 
language.

```
<html lang="en">
<head name="Standard">
    <title>News</title>
</head>
<body>

<header name="Standard"/>

<div class="container">
    <div class="row">
        <main name="Standard" class="editable">
            <h1>News</h1>

            <alert type="info">
                Check out the latest stories from Ouxsoft.
            </alert>

            <partial name="News">
                <arg name="limit" type="int">10</arg>
                <arg name="format">
                    <article class="mb-5">
                        <h3>{{title}}</h3>
                        <p class="text-muted">
                            <date>{{publish_date}}</date>
                        </p>
                        {{body}}
                        <hr/>
                    </article>
                </arg>
            </partial>

        </main>

        <nav name="SideMenu">
            <arg name="menu" type="string">news</arg>
            <nav name="QuickLinks" class="editable">
                <arg name="menu" type="string">help</arg>
                <a href="https://github.com/Ouxsoft/hoopless">
                    Hoopless
                </a>
                <a href="https://github.com/Ouxsoft/PHPMarkup">
                    PHPMarkup
                </a>
                <a href="https://github.com/Ouxsoft/LHTML">
                    LHTML Standard
                </a>
            </nav>
        </nav>
    </div>
</div>

<footer name="Standard"/>
</body>
</html>

```

## Installation

For deployment, we recommend [Hoopless Stack](https://github.com/Ouxsoft/hoopless-stack).