<form action="iotLibraries/GPIO_SWITCH/GPIO_SWITCH.php">
    <input type="hidden" name="gpio[]" value="18"/>
    <button class="button" style="
    <?PHP
    $status = shell_exec('gpio -g read 18');
    if ($status == 0) {
        echo "background-color: #AF4C4C ";
    }
    ?>" type="submit">SWITCH No18
    </button>
</form>


            