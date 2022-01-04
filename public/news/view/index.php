<partial name="Page">

    <partial name="PageHeader" />

    <partial name="PageContent">
        <partial name="PageMainContent" class="editable">
            <widget name="News">
                <arg name="id" type="int"><var name="id" source="get" /></arg>
                <arg name="limit" type="int">1</arg>
                <arg name="format">
                    <article class="mb-5">
                        <h1>{{story.title}}</h1>
                        <p class="text-muted">
                            <date>{{story.publish_date}}</date>
                        </p>
                        {{story.body|raw}}
                    </article>
                </arg>
            </widget>

        </partial>

        <partial name="PageSideBar">
            <partial name="QuickLinks" class="editable">
            </partial>
        </partial>
    </partial>

    <partial name="PageFooter" />
</partial>