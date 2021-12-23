<partial name="Page">

    <partial name="PageHeader" title="Help" tier="2" image="/assets/images/dimension/800x300/offset/0,-20/gallery/developer.jpg"/>

    <partial name="PageContent">
        <partial name="PageMainContent">
            <h2>Editing Guide</h2>
            <p class="lead">
                Hoopless is the super power used to manage this site.
                It's a content management system (CMS) built from the ground up based empowering web curators.
            </p>

            <h3>PHPMarkup</h3>
            <p>
                To provide the best experience for our web editors and users, our pages are dynamically maintained
                using PHPMarkup.
                <a href="/help/phpmarkup">Learn more</a>.
            </p>

            <h3>Bootstrap CSS Framework</h3>
            <p>
                Bootstrap CSS framework is used to make this site responsive and mobile-first sites. Learn about the
                Bootstrap CSS classes available via the <a href=" https://getbootstrap.com/docs/">official website</a>.
            </p>

            <h3>Accessibility Guidelines</h3>
            <p>
                Editors must adhere to the <a href="https://www.w3.org/WAI/WCAG20/glance/">WCAG 2.0 Accessibility
                    standards</a> when editing this website to help ensure the information presented remains
                perceivable, operable, and understandable to all.
            </p>
        </partial>

        <partial name="PageSideBar">
            <partial name="QuickLinks" class="editable">
                <arg name="menu" type="string">help</arg>
                <a href="https://github.com/Ouxsoft/hoopless">
                    Hoopless
                </a>
                <a href="https://github.com/Ouxsoft/PHPMarkup">
                    PHPMarkup
                </a>
                <a href="https://getbootstrap.com/docs/5.0/getting-started/introduction">
                    Bootstrap CSS
                </a>
                <a href="https://github.com/Ouxsoft/LHTML">
                    LHTML Standard
                </a>
            </partial>
        </partial>
    </partial>

    <partial name="PageFooter" />
</partial>