<?php


namespace main;


class SessionVariables
{

    public function __construct()
    {
        if (session_status() == 0) {
            echo "PHP_SESSION_DISABLED";

        } elseif (session_status() == 1) {
            session_start();
//            echo "session started";

        } elseif (session_status() == 2) {
//            echo "session ok";
        }

    }

    public function getTest()
    {
        return $_SESSION['test'];
    }

    public function setTest($LcdLine2): void
    {
        $_SESSION['test'] = $LcdLine2;
    }


}