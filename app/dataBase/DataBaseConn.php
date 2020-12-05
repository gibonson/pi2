<?php


namespace app\dataBase;

require_once "config.php";


class DataBaseConn
{

    public $DBStatus;


    public function conn()
    {
        $conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSOWD, DATABASE_NAME);

        if (!$conn) {
            $this->DBStatus = 'Conn: fail';
        } else {
            $this->DBStatus = 'Conn: OK';
        }
    }

    public function __toString()
    {
        try {
            return (string)$this->DBStatus;
        } catch (Exception $exception) {
            return 'string error';
        }
    }
}