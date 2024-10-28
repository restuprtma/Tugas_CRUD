<?php
$serverName = "IDP3I-ICA";   // Nama server SQL Server
$connectionInfo = array(
    "Database" => "absensi_db", // Nama database
    "UID" => "",      // Username
    "PWD" => ""       // Password
);

$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Connected Sucessfully";
}
?>
