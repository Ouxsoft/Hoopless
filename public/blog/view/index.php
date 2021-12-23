<partial name="Page">

    <partial name="PageHeader"/>

    <partial name="PageContent">
        <partial name="PageMainContent" class="editable">

            <partial name="Blog">
                    <arg name="id" type="int"><var name="id" source="get"/></arg>
                    <arg name="limit" type="int">1</arg>
                    <arg name="format">
                        <article class="mb-5">
                            <h1>{{blog.title}}</h1>
                            <p class="text-muted">
                                <date>{{blog.publish_date}}</date>
                            </p>
                            {{blog.body|raw}}
                        </article>
                    </arg>
                </partial>
            </partial>

    </partial>

    <partial name="PageFooter" />
</partial>