<partial name="Page">

    <partial name="PageHeader" tier="2" title="Blogs" image="/assets/images/dimension/800x300/offset/0,-20/gallery/developer.jpg" />

    <partial name="PageContent">
        <partial name="PageMainContent" class="editable">

            <blockquote class="blockquote">
                Here are the latest blogs from our staff.
            </blockquote>

            <div class="list-group">
                <widget name="Blog">
                    <arg name="limit" type="int">10</arg>
                    <arg name="format">
                        <a href="/blog/{{blog.blog_id}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ blog.title}}</h5>
                                <small>{{ blog.publish_date}}</small>
                            </div>
                        </a>
                    </arg>
                </widget>
            </div>

        </partial>

        <partial name="PageSideBar">
            <partial name="QuickLinks" class="editable">
                <arg name="menu" type="string">help</arg>
                <a href="https://www.scrumalliance.org/">
                    ScrumAlliance
                </a>
            </partial>
        </partial>
    </partial>

    <partial name="PageFooter" />
</partial>