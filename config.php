<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'teste';

$host = 'http://localhost/agenda2/';

try {
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
} catch (\Throwable $th) {
    throw $th;
}
?>