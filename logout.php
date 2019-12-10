<?php

session_start();

echo $_SESSION["Username"]."<br>";
echo $_SESSION["isUserLogin"]."<br>";
unset($_SESSION["isUserLogin"]);

echo "IM LOGED OUT...".$_SESSION["isUserLogin"];
// $current_url = $_SERVER['REQUEST_URI'];


// ob_start();
// header("location: $current_url");
// ob_end_flush();
// die();


?>