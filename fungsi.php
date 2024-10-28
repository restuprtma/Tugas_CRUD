<?php
include 'conect.php'; // Pastikan 'koneksi.php' sudah benar untuk koneksi SQL Server

// Fungsi untuk mengambil data mahasiswa
function getStudents() {
    global $conn;
    $sql = "SELECT ID_Siswa, NIM, Nama_Siswa, Alpha, Izin, Sakit FROM TB_Mahasiswa";
    $stmt = sqlsrv_query($conn, $sql);
    $mahasiswa = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $mahasiswa[] = $row;
    }
    return $mahasiswa;
}

// Fungsi untuk menambah data mahasiswa
function addStudent($nim, $nama, $alpha, $izin, $sakit) {
    global $conn;
    $sql = "INSERT INTO TB_Mahasiswa (NIM, Nama_Siswa, Alpha, Izin, Sakit) VALUES (?, ?, ?, ?, ?)";
    $params = array($nim, $nama, $alpha, $izin, $sakit);
    sqlsrv_query($conn, $sql, $params);
}

// Fungsi untuk memperbarui data mahasiswa
function updateStudent($nim, $alpha, $izin, $sakit) {
    global $conn;
    $sql = "UPDATE TB_Mahasiswa SET Alpha = ?, Izin = ?, Sakit = ? WHERE NIM = ?";
    $params = array($alpha, $izin, $sakit, $nim);
    sqlsrv_query($conn, $sql, $params);
}

// Fungsi untuk menghapus data mahasiswa
function deleteStudent($nim) {
    global $conn;
    $sql = "DELETE FROM TB_Mahasiswa WHERE NIM = ?";
    $params = array($nim);
    $result = sqlsrv_query($conn, $sql, $params);
    if ($result === false) {
        die(print_r(sqlsrv_errors(), true)); // Menampilkan error jika query gagal
    } 
}
?>
