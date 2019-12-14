<?php

echo $_SERVER['REQUEST_URI']."<br>";

echo $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."<br>";
if (strstr($actual_link, "test.php")) {
    echo "ok";
}
else {
    echo "not";
}
echo "<br>";
echo "<br>";
echo "<br>";
echo "<pre>";
print_r($_SERVER);


?>