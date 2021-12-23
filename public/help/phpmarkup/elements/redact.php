<partial name="Page">

    <partial name="PageHeader"/>

    <partial name="PageContent">
        <partial name="PageMainContent" class="editable">

            <h1>Redacted Element</h1>
            Whole paragraphs can be redacted:

            <code demo="true" process="false">
                <p>Praesent ullamcorper eros nec neque luctus, sed sodales risus euismod. Proin consectetur elementum urna at
                    feugiat.
                    Vivamus porttitor <redact>vulputate orci</redact> id consequat. Phasellus ut dui sagittis, elementum ante a, rutrum velit.
                    Duis
                    mollis feugiat purus nec porttitor.</p>
                <p><redact>
                        Nulla tempor nunc et libero malesuada, mattis rutrum odio euismod. Proin commodo ligula luctus justo
                        mollis, placerat purus.
                    </redact></p>
            </code>

        </partial>

        <partial name="PageSideBar">
        </partial>
    </partial>

    <partial name="PageFooter" />
</partial>
