# Hoopless

<a href="https://app.codacy.com/gh/Ouxsoft/Hoopless?utm_source=github.com&utm_medium=referral&utm_content=Ouxsoft/Hoopless&utm_campaign=Badge_Grade_Dashboard">
    <img alt="Codacy grade" src="https://api.codacy.com/project/badge/Grade/af61c01e07894689b9be009591e6b3b1">
</a>
<a href="https://github.com/Ouxsoft/Hoopless/issues">
    <img alt="GitHub Help Wanted" src="https://img.shields.io/github/issues/ouxsoft/hoopless/help%20wanted.svg">
</a>

## About

Hoopless is a content management system. 

It a web curator's super power.

It aims to make static and dynamic content easy to build and maintain.

```
<partial name="Page">
    <partial name="PageHeader" title="About" tier="2" image="/assets/images/dimension/800x300/offset/0,-20/gallery/developer.jpg"/>

    <partial name="PageContent">
        <partial name="PageMainContent" class="editable">
           Hello, World!
        </partial>

        <partial name="PageSideBar">
            <partial name="QuickLinks" class="editable">
                <a href="/hello-world">
                    Learn More
                </a>
            </partial>
        </partial>
    </partial>

    <partial name="PageFooter" />
</partial>
```

Hoopless is modular and built on shoulders of these open-source packages:

*  **[Symfony](https://symfony.com/doc/current/)**: Performs annotated auto routing, dependency injection, and more.
*  **[React](https://reactjs.org/)**: A JavaScript library for building user interfaces. 
*  **[PHPMarkup](https://github.com/ouxsoft/PHPMarkup)**: A markup abstraction layer to super power page editing, reduce technical debt, and create dialect for the team to communicate design. 
*  **[DynamoImage](https://github.com/Ouxsoft/DynamoImage)**: Automatically resizes and caches images to request.
*  **[Doctrine ORM](https://www.doctrine-project.org/projects/doctrine-orm/en/2.9/index.html)**: A object–relational mapping for converting data between the application and data layer.
*  **[Doctrine Migrations](https://www.doctrine-project.org/projects/doctrine-migrations/en/3.0/index.html)**: Syncs entity changes with data layer and manages data layer changes.
*  **[Twig](https://twig.symfony.com/)**: Templating engine. 
*  **[Bootstrap](https://getbootstrap.com/docs/5.0/getting-started/introduction/)**: CSS framework for responsive mobile-first sites.
*  **[TinyMCE](https://www.tiny.cloud/docs/)**: TinyMCE for page editing.
*  **[Monolog](https://symfony.com/doc/current/logging.html)**: Logger.
*  **[SCSSPHP](https://scssphp.github.io/scssphp/)**: Rebuild SCSS changes on the fly.