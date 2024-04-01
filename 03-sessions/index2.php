<?php

$string = "admin";

echo "El md5 de admin es: " .  md5($string);

echo "<br><br><br>";

echo "el hash de admin es: " .password_hash($string, PASSWORD_DEFAULT); 



?>