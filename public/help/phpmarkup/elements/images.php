<partial name="Page">

    <partial name="PageHeader"/>

    <partial name="PageContent">
        <partial name="PageMainContent" class="editable">

            <h1>Images Element</h1>
            <p>
                Images can be automatically resized for your need. Simply upload large images and have them resized on the fly.
            </p>

            <h2>Parameters</h2>
            <p>Local images with parameters inside the request are automatically adjusted and cached.</p>

            <h3>Resizing Image</h3>
            <p>Images can be resized on the fly using parameterized requests</p>

            <code demo="true" process="false">
                <!-- resize by height -->
                <img src="/assets/images/height/50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                <!-- resize by width -->
                <img src="/assets/images/width/50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                <!-- resize by width and height -->
                <img src="/assets/images/width/50/height/50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                <!-- resize by width and height using dimension parameter -->
                <img src="/assets/images/dimension/50x50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
            </code>

            <h3>Offset</h3>
            <p>
                Set the focal point of an image using offsets. The syntax is X%,Y% with values ranging from -50 to 50 with 0 being center.
            </p>

            <code demo="true" process="false">
                <!-- center -->
                <img src="/assets/images/dimension/50x50/offset/0,0/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                <!-- left -->
                <img src="/assets/images/dimension/50x50/offset/-50,0/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                <!-- right -->
                <img src="/assets/images/dimension/50x50/offset/50,0/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                <!-- top -->
                <img src="/assets/images/dimension/50x50/offset/0,-50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
                <!-- bottom -->
                <img src="/assets/images/dimension/50x50/offset/0,50/livingmarkup/logo/original.jpg" alt="PHPMarkup" />
            </code>

        </partial>

        <partial name="PageSideBar">
        </partial>
    </partial>

    <partial name="PageFooter" />
</partial>
