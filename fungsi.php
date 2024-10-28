<?php
include 'conect.php';

// Fungsi untuk mengambil data mahasiswa
function getStudents() {
    global $conn;
    $sql = "SELECT * FROM Students";
    $stmt = sqlsrv_query($conn, $sql);
    $students = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $students[] = $row;
    }
    return $students;
}

// Fungsi untuk menambah data mahasiswa
function addStudent($nim, $name, $alpha, $izin, $sakit) {
    global $conn;
    $sql = "INSERT INTO Students (NIM, Name, Alpha, Izin, Sakit) VALUES (?, ?, ?, ?, ?)";
    $params = array($nim, $name, $alpha, $izin, $sakit);
    sqlsrv_query($conn, $sql, $params);
}

// Fungsi untuk memperbarui data mahasiswa
function updateStudent($nim, $alpha, $izin, $sakit) {
    global $conn;
    $sql = "UPDATE Students SET Alpha = ?, Izin = ?, Sakit = ? WHERE NIM = ?";
    $params = array($alpha, $izin, $sakit, $nim);
    sqlsrv_query($conn, $sql, $params);
}

// Fungsi untuk menghapus data mahasiswa
function deleteStudent($nim) {
    global $conn;
    $sql = "DELETE FROM Students WHERE NIM = ?";
    $params = array($nim);
    sqlsrv_query($conn, $sql, $params);
}
?>
