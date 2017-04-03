    <h1>Assembly and Return</h1>

    <form method="post" action="AssemblyController/assemblyOrReturn">
        {tableTop}
        {tableTorso}
        {tableBottom}
        <div class="buttons">
            <input type="submit" name="assembly" value="Assembly Your Own" />
            <input type="submit" name="return" value="Return to Us" />
        </div>
    </form>

    <form method="post" action="AssemblyController/ship">
        {tableRobots}
        <div class="ship">
            <input type="submit" name="ship" value="Ship it Now" />
        </div>
    </form>

