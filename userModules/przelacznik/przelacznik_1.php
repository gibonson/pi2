            <form action="modules/<?PHP echo $module->getModuleName()?>/script/<?PHP echo $module->getScriptName()?>">
    <button class="button" style="
    <?PHP
    $status = shell_exec('gpio -g read 18');
    if ($status == 0) {
        echo "background-color: #AF4C4C ";
    }

    ?>
            " type="submit">SWITCH No1
    </button>
</form>


            