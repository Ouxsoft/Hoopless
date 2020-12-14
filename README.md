<p align="center"><h1>Hoopless</h1></p>
<b>BETA</b>

<p align="center">
<a href="https://packagist.org/packages/ouxsoft/hoopless"><img alt="Packagist Version (including pre-releases)" src="https://img.shields.io/packagist/v/ouxsoft/hoopless?include_prereleases"></a> <!-- <a href="https://travis-ci.com/github/ouxsoft/hoopless"> <img src="https://api.travis-ci.org/ouxsoft/Hoopless.svg?branch=master&status=failed" alt="Build Status"></a> --> <a href="https://app.codacy.com/gh/ouxsoft/Hoopless?utm_source=github.com&utm_medium=referral&utm_content=ouxsoft/Hoopless&utm_campaign=Badge_Grade_Dashboard"><img alt="Codacy grade" src="https://api.codacy.com/project/badge/Grade/af61c01e07894689b9be009591e6b3b1"></a> <!-- <a href="https://codecov.io/gh/ouxsoft/hoopless"> <img alt="Codecov" src="https://img.shields.io/codecov/c/github/ouxsoft/hoopless"> </a> --> <a href="https://packagist.org/packages/ouxsoft/hoopless"><img src="https://poser.pugx.org/ouxsoft/hoopless/downloads" alt="Total Downloads"></a>
</p>


## About

A modular content management system in PHP.

HTML should be maintainable and separated by a markup abstraction layer.

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

### Via Composer
Hoopless is available on [Packagist](https://packagist.org/packages/ouxsoft/hoopless).

Install with [Composer](https://getcomposer.org/download/):
```shell script
composer require ouxsoft/hoopless
```

### Via Git
Install with [Git](https://git-scm.com/):
```shell script
git clone git@github.com:ouxsoft/Hoopless.git
```

## Usage

### Via Docker 
Start container with [Docker](https://docs.docker.com/get-docker/) for local development.

```shell script
sudo ./stack start dev
```
View in browser [https://localhost](https://localhost)

### Via Shell
Start on production Ubuntu 18.04 server
```shell script
sudo ./stack install prod
```

## Creators

***Matthew Heroux***

  * [https://github.com/hxtree](https://github.com/hxtree)