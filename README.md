# Hoopless

<img alt="GitHub release (latest by date)" src="https://img.shields.io/github/v/release/Ouxsoft/hoopless">
<a href="#tada-php-support" title="PHP Versions Supported">
        <img alt="PHP Versions Supported" src="https://img.shields.io/badge/php-7.3%20to%208.0-777bb3.svg?logo=php&logoColor=white&labelColor=555555">
    </a>      
<a href="https://app.codacy.com/gh/Ouxsoft/Hoopless?utm_source=github.com&utm_medium=referral&utm_content=Ouxsoft/Hoopless&utm_campaign=Badge_Grade_Dashboard">
    <img alt="Codacy grade" src="https://api.codacy.com/project/badge/Grade/af61c01e07894689b9be009591e6b3b1">
</a>
<a href="https://github.com/Ouxsoft/Hoopless/issues">
    <img alt="GitHub Help Wanted" src="https://img.shields.io/github/issues/ouxsoft/hoopless/help%20wanted.svg">
</a>

## About

Hoopless is a modular content management that is built on shoulders of these open-source packages:

*  **[Symfony](https://symfony.com/doc/current/)**: Performs annotated auto routing, dependency injection, and more.
*  **[React]https://reactjs.org/)**: A JavaScript library for building user interfaces. 
*  **[PHPMarkup](https://github.com/ouxsoft/PHPMarkup)**: A markup abstraction layer to super power page editing, reduce technical debt, and create dialect for the team to communicate design. 
*  **[DynamoImage](https://github.com/Ouxsoft/DynamoImage)**: Automatically resizes and caches images to request.
*  **[Doctrine ORM](https://www.doctrine-project.org/projects/doctrine-orm/en/2.9/index.html)**: A object–relational mapping for converting data between the application and data layer.
*  **[Doctrine Migrations](https://www.doctrine-project.org/projects/doctrine-migrations/en/3.0/index.html)**: Syncs entity changes with data layer and manages data layer changes.
*  **[Twig](https://twig.symfony.com/)**: Templating engine. 
*  **[Bootstrap](https://getbootstrap.com/docs/5.0/getting-started/introduction/)**: CSS framework for responsive mobile-first sites.
*  **[TinyMCE](https://www.tiny.cloud/docs/)**: TinyMCE for page editing.
*  **[Monolog](https://symfony.com/doc/current/logging.html)**: Logger.

It also features:
*  **SCSS Generation**: Automatically rebuild changes to SCSS sheets.
*  **Custom Elements**: Custom server side rendered elements.

```
<html lang="en">
<head name="Standard">
    <title>Services</title>
</head>
<body>

<partial name="PageHeader">
    <arg name="title">Services</arg>
    <arg name="tier" type="int">2</arg>
    <arg name="image">/assets/images/dimension/800x300/offset/0,-20/gallery/developer.jpg</arg>
</partial>

<div class="container">
    <div class="row">
        <main name="Standard" class="editable">
            <h2>Consulting</h2>
            <p>We are not accepting new clients currently.</p>
        </main>

        <nav name="SideMenu">
            <arg name="menu" type="string">contact</arg>
        </nav>
    </div>
</div>

<footer name="Standard"/>
</body>
</html>

```
