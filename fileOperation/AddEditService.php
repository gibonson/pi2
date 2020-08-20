<?php


namespace main;


class AddEditService
{
    public function addService($ServiceName, $boxName, $boxContent, $fileIotLibraries, $fileBackground)
    {

        echo $fullPath = "/home/pi/www/userFiles/" . $ServiceName;
        $permissionCommand = "sudo chmod -R 777 " . $fullPath;


        if (file_exists($fullPath)) {
            $oldFullPath = $fullPath . "-old-" . microtime(true);
            if (rename($fullPath, $oldFullPath)) {
                echo "udało sie zmienić nazwe  folderu na " . $oldFullPath . "<br>";
            } else {
                echo "nie udało sie zmienić nazwe  folderu na " . $oldFullPath . "<br>";
            }
        }

        if (!file_exists($fullPath)) {
            if (mkdir($fullPath, 0777, true)) {
                echo "utworzono folder " . $fullPath . "<br>";
            } else {
                echo "blad tworzenia folderu " . $fullPath . "<br>";
            }
        }

        echo $boxName . "/<br>";

        $createBox = fopen($fullPath . "/" . $boxName, "w") or die("Unable to create file!");
        $createFileIotLibraries = fopen($fullPath . "/" . "library.txt", "w") or die("Unable to create file!");;
        $createFileBackground = fopen($fullPath . "/" . "background.txt", "w") or die("Unable to create file!");;
        fwrite($createBox, $boxContent);
        fclose($createBox);

        fwrite($createFileIotLibraries, $fileIotLibraries);
        fclose($createFileIotLibraries);

        fwrite($createFileBackground, $fileBackground);
        fclose($createFileBackground);

        exec($permissionCommand);

        echo '<a href="post.php"><background src="background/icon-RPi-Logo.png" style="height:70px;"></a>';

    }


    public
    function editService()
    {

    }

    public
    function removeService()
    {

    }

    public
    function hideService()
    {

    }

}