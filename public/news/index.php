<partial name="Page">

    <partial name="PageHeader" title="News &amp; Events" tier="2" image="/assets/images/dimension/800x300/offset/0,-20/gallery/developer.jpg"/>

    <partial name="PageContent">
        <partial name="PageMainContent" class="editable">

            <blockquote class="blockquote">
                Here is the latest from Ouxsoft.
            </blockquote>

            <div class="list-group">
                <widget name="News">
                    <arg name="limit" type="int">10</arg>
                    <arg name="format">
                        <a href="/news/{{ story.news_id }}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ story.title }}</h5>
                                <small>{{ story.publish_date }}</small>
                            </div>
                        </a>
                    </arg>
                </widget>
            </div>

        </partial>

        <partial name="PageSideBar">
            <partial name="QuickLinks" class="editable">
            </partial>
        </partial>
    </partial>

    <partial name="PageFooter" />
</partial>