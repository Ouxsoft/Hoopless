<html lang="en">
<head name="Standard">
    <title>LuckByDice</title>
</head>
<body>

<partial name="PageHeader">
</partial>

<div class="container">
    <div class="row">
        <partial name="PageMainContent" class="editable">
            <h1>LuckByDice</h1>
            <blockquote class="blockquote">
                <p class="mb-0">
                    The problem with dice rollers is there is no sense of luck! How can you quantity something illusive
                    as luck?
                </p>
            </blockquote>


            <p>
                This is a problem we originally developed a solution for in a video game we released in 2005.
                It started as an excel spreadsheet, then a Lua script, then a C# library, and now we're supporting it
                as a PHP library, called LuckByDice.

                <b>Give it a try!</b>
            </p>

            <widget name="DiceRoll">
                <arg name="notation"></arg>
            </widget>
        </partial>

        <partial name="PageSideBar">
            <nav name="QuickLinks" class="editable">
            </nav>
        </partial>
    </div>
</div>

<footer name="Standard"/>
</body>
</html>

