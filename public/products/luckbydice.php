<partial name="Page">

    <partial name="PageHeader">
        <arg name="tier" type="int">3</arg>
    </partial>

    <partial name="PageContent">
        <partial name="PageMainContent" class="editable">

            <h1>LuckByDice</h1>    

            <p class="lead">
                An <b>open-source package</b> and algorithm rolling <b>dice notations</b> and 
                handling <b>luck</b>.
            </p>

            <figure class="text-center bg-light p-5">
                <blockquote class="blockquote">
                    <p>"How can one quantity something as elusive as luck?"</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Ouxsoft Staff <cite title="Source Title">'05</cite>
                </figcaption>
            </figure>

            <p>
                This is a problem we originally developed a solution for a long time ago...
                It originally started as a set of formulas in an excel spreadsheet. 
                Then it became a Lua script used in a video game released in back 2005.
                Next it became a C# library. 
                And now we're supporting it as a PHP library, called LuckByDice.
            </p>

            <h2>Try it Out!</h2>
            <widget name="DiceRoll">
                <arg name="notation"></arg>
            </widget>

            <h2>Usage</h2>
            <p>
                Run dice notations using <a href="https://docker.com/">Docker</a>:
            </p>
            <code>
            $ docker run ouxsoft/luckbydice:latest bin/luckbydice d3,4d6+1,5d+1*2
            </code>

            <p>
                Install using <a href="https://getcomposer.org/">Composer</a>:
            </p> 
            <code>
            $ composer require ouxsoft/luckbydice
            </code>

        </partial>

        <partial name="PageSideBar">
            <partial name="QuickLinks" class="editable">
                <a href="https://github.com/Ouxsoft/LuckByDice">Code Repo</a>
                <a href="https://luckbydice.readthedocs.io/en/latest/project/glossary.html#dice-notation">How Do Dice Notations Work?</a>
            </partial>
        </partial>
    </partial>

    <partial name="PageFooter"/>
</partial>