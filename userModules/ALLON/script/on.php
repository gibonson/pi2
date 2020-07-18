<?php

shell_exec('gpio -g mode 17 out');
shell_exec('gpio -g mode 18 out');
shell_exec('gpio -g mode 27 out');
shell_exec('gpio -g mode 22 out');

shell_exec('gpio -g write 17 1');
shell_exec('gpio -g write 18 1');
shell_exec('gpio -g write 27 1');
shell_exec('gpio -g write 22 1');
header("Location: ../../../index.php");