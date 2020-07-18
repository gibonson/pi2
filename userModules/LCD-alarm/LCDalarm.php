<form action="modules/<?PHP echo $module->getModuleName() ?>/script/<?PHP echo $module->getScriptName() ?>"
      method="get">
    <button class="button" type="submit" name="lcd">LCD</button>
    <br><br>
    <label for="line1">alarm</label>
    <input type="number" name=alarm value="10"/><br>
    <label for="line1">komunikat</label>
    <input type="text" name=komunikat value="_"/><br>
</form>