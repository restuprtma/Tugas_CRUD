<?php
$serverName = "";   // Nama server SQL Server
$connectionInfo = array(
    "Database" => "", // Nama database
    "UID" => "",      // Username
    "PWD" => ""       // Password
);

$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
