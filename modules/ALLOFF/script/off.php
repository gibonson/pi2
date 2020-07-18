<?php

shell_exec('gpio -g write 17 0');
shell_exec('gpio -g write 18 0');
shell_exec('gpio -g write 27 0');
shell_exec('gpio -g write 22 0');

header("Location: ../../../index.php");