            <?php

//shell_exec('gpio -g mode 18 out');
$status = shell_exec('gpio -g read 18');
if($status == 0){
	shell_exec('gpio -g write 18 1');
}
else{
	shell_exec('gpio -g write 18 0');
}

header("Location: ../../../index.php");
?>





//gpio -g mode 22 out

            