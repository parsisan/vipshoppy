<?php

session_start();
if(!isset($_SESSION))
{
    

    $_SESSION["TEST"] = 1;
    echo $_SESSION["TEST"];
}
else
{
    echo $_SESSION["TEST"];
}


?>