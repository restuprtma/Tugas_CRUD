<?php
include 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    
    // Validasi data dari form
    $nim = $_POST['nim'] ?? null;
    $nama = $_POST['nama'] ?? null;
    $alpha = $_POST['alpha'] ?? 0;
    $izin = $_POST['izin'] ?? 0;
    $sakit = $_POST['sakit'] ?? 0;

    switch ($action) {
        case 'add':
            if ($nim && $nama) { // Pastikan NIM dan Name ada untuk Add
                addStudent($nim, $nama, $alpha, $izin, $sakit);
            }
            break;

        case 'update':
            if ($nim) { // Pastikan NIM ada untuk Update
                updateStudent($nim, $alpha, $izin, $sakit);
            }
            break;

        case 'delete':
            if ($nim) { // Pastikan NIM ada untuk Delete
                deleteStudent($nim);
            }
            break;
    }
    header("Location: index.php"); // Redirect kembali ke halaman utama
    exit();
}
?>