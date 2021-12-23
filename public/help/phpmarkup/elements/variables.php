<partial name="Page">

    <partial name="PageHeader"/>

    <partial name="PageContent">
        <partial name="PageMainContent" class="editable">

            <h1>Variable Element</h1>
            LHTML allows child elements to access ancestor elements public variables.

            <code process="false" demo="true">
                <example name="GroupProfile">
                    <fieldset>
                        <legend>Group: <var name="group"/></legend>

                        <example name="UserProfile">
                            <p>Welcome <var tag="example" name="first_name"/> <var name="last_name"/></p>
                        </example>
                    </fieldset>
                </example>
            </code>

        </partial>

        <partial name="PageSideBar">
        </partial>
    </partial>

    <partial name="PageFooter" />
</partial>
