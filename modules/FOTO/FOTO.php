<form action="modules/<?PHP echo $module->getModuleName()?>/script/<?PHP echo $module->getScriptName()?>" method="get">
    <input type="hidden" name="module" value="<?PHP echo $module->getModuleName()?>">
    <button class="button" type="submit">Create new foto</button>
</form>
<a href="modules/<?PHP echo $module->getModuleName()?>/cameraTestFile.jpg">GET FOTO</a>