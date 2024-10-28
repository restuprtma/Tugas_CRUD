<?php
include 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            // Data dummy untuk testing, bisa disesuaikan sesuai input sebenarnya
            $nim = '12345';
            $name = 'John Doe';
            $alpha = 0;
            $izin = 0;
            $sakit = 0;
            addStudent($nim, $name, $alpha, $izin, $sakit);
            break;

        case 'update':
            // Data dummy untuk testing, bisa disesuaikan sesuai input sebenarnya
            $nim = '12345';
            $alpha = 1;
            $izin = 0;
            $sakit = 0;
            updateStudent($nim, $alpha, $izin, $sakit);
            break;

        case 'delete':
            // Data dummy untuk testing, bisa disesuaikan sesuai input sebenarnya
            $nim = '12345';
            deleteStudent($nim);
            break;
    }
    header("Location: index.html"); // Redirect kembali ke halaman utama
    exit();
}
?>
