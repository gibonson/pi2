            <?php
?>
<form action="modules/<?PHP echo $module->getModuleName()?>/script/<?PHP echo $module->getScriptName()?>" method="get">
    <button class="button" type="submit" name="lcd">LCD</button>
    <br><br>
    <label for="line1">line1</label>
    <input type="text" name=line1 value="_"/><br>
    <label for="line1">line2</label>
    <input type="text" name=line2 value="_"/><br>
</form>

            