<form action="iotLibraries/GPIO_SWITCH/GPIO_SWITCH.php">
    <input type="hidden" name="gpio[]" value="20"/>
    <button class="button" style="
    <?PHP
    $status = shell_exec('gpio -g read 20');
    if ($status == 0) {
        echo "background-color: #AF4C4C ";
    }
    ?>" type="submit">led1
    </button>
</form>


            