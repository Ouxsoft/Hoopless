<partial name="Page">

    <partial name="PageHeader"/>

    <partial name="PageContent">
        <partial name="PageMainContent" class="editable">

            <h1>If Element</h1>
            <p>
                An if statement is a programming conditional statement that, if proved true, shows the information
                contained within.  If statements should be used sparingly; it is better to use a custom element to maintain
                complex nested logic;.
            </p>

            <h2>Conditions</h2>
            <p>An if statement toggle is based on one or more conditional checks that are supplied as arguments.</p>

            <p>The example conditions are based on the server's current time <?php echo date('F j, Y, g:i a'); ?></p>

            <h3>Time</h3>
            <p>A condition based on the time of day.</p>

            <code demo="true" process="false">
                <if time_start="3:00am" time_end="11:59am">
                    <p>Good morning.</p>
                </if>
                <if time_start="12:00pm" time_end="3:59pm">
                    <p>Good day.</p>
                </if>
                <if>
                    <arg name="time_start" type="string">2:00pm</arg>
                    <arg name="time_end" type="string">2:59am</arg>
                    <p>Good evening.</p>
                </if>
            </code>

            <h3>Day of Week</h3>
            <p>A condition based on the day of the week.</p>
            <code demo="true" process="false">
                <if>
                    <arg name="day_of_week">Tuesday</arg>
                    <arg name="day_of_week">Friday</arg>
                    <p>You've come during Tuesday and Friday sale!</p>
                </if>
                <if>
                    <arg name="day_of_week">Sunday</arg>
                    <arg name="day_of_week">Saturday</arg>
                    <p>You've come during our weekend sale!</p>
                </if>
            </code>


            <h3>Date</h3>
            <p>A condition based on dates.</p>
            <code demo="true" process="false">
                <if>
                    <arg name="date_start">December 3. 2019</arg>
                    <arg name="date_end">December 3, 2019</arg>
                    <arg name="else">
                        <p>Regular shipping rates apply.</p>
                    </arg>
                    <p>We are offering FREE shipping for a limited time.</p>
                </if>
            </code>


            <h3>Datetime</h3>
            <p>A condition based on datetimes.</p>
            <code demo="true" process="false">
                <if>
                    <arg name="datetime_start">December 4. 2019 1:00 am</arg>
                    <arg name="datetime_end">December 4, 2019 2:00 am</arg>
                    <arg name="else">
                        <p>FREE pen with each order.</p>
                    </arg>
                    <p>FREE limited edition mousepad with each order.</p>
                </if>
            </code>


        </partial>

        <partial name="PageSideBar">
        </partial>
    </partial>

    <partial name="PageFooter" />
</partial>
