<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abseni Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">

    <script>
        function showForm(action) {
            document.getElementById('form-container').style.display = 'block';
            document.getElementById('form-action').value = action;
        }

        function hideForm() {
            document.getElementById('form-container').style.display = 'none';
        }

        function showUpdateForm(student) {
        document.getElementById('form-container').style.display = 'block';
        document.getElementById('form-action').value = 'update';
        document.getElementById('nim').value = student.NIM;
        document.getElementById('nama').value = student.Nama_Siswa;
        document.getElementById('alpha').value = student.Alpha;
        document.getElementById('izin').value = student.Izin;
        document.getElementById('sakit').value = student.Sakit;
        }

        function showDeleteConfirmation(nim) {
            if (confirm("Apakah Anda yakin ingin menghapus data mahasiswa dengan NIM: " + nim + "?")) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = 'proses.php';
                
                const actionInput = document.createElement('input');
                actionInput.type = 'hidden';
                actionInput.name = 'action';
                actionInput.value = 'delete';
                form.appendChild(actionInput);

                const nimInput = document.createElement('input');
                nimInput.type = 'hidden';
                nimInput.name = 'nim';
                nimInput.value = nim;
                form.appendChild(nimInput);

                document.body.appendChild(form);
                form.submit();
            }
        }


    </script>
</head>
<body>
<div class="table-container">
    <h2 class="title">Absensi Mahasiswa</h2>
        <!-- Tabel -->
        <table>
            <thead>
                <tr>
                    <th>No Absen</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alpha</th>
                    <th>Izin</th>
                    <th>Sakit</th>
                </tr>
            </thead>

            <?php
                    include 'fungsi.php';
                    $students = getStudents(); // Memanggil fungsi untuk mendapatkan data mahasiswa
                    foreach ($students as $mahasiswa) {
                        echo "<tr>
                                <td>{$mahasiswa['ID_Siswa']}</td>
                                <td>{$mahasiswa['NIM']}</td>
                                <td>{$mahasiswa['Nama_Siswa']}</td>
                                <td>{$mahasiswa['Alpha']}</td>
                                <td>{$mahasiswa['Izin']}</td>
                                <td>{$mahasiswa['Sakit']}</td>
                                <td><button type='button' class='update-button' onclick='showUpdateForm(" . json_encode($mahasiswa) . ")'>Update</button></td>
                                <td> <button type='button' class='delete-button' onclick='showDeleteConfirmation(\"{$mahasiswa['NIM']}\")'>Delete</button><td>
                              </tr>";
                    }
                ?>

        </table>

        <!-- Tombol CRUD -->
    <div class="button-container">
        <button type="button" class="add-button" onclick="showForm('add')">Tambah</button>
    </div>

    <!-- Form Tambah Data -->
    <div id="form-container" style="display:none;">
        <form action="proses.php" method="POST">
            <input type="hidden" id="form-action" name="action" value="">
            <input type="hidden" id="absen" name="absen" value="">
            <label for="nim">NIM:</label><input type="text" id="nim" name="nim" required><br><br>
            <label for="nama">Nama:</label><input type="text" id="nama" name="nama" required><br><br>
            <label for="alpha">Alpha:</label><input type="number" id="alpha" name="alpha" required><br><br>
            <label for="izin">Izin:</label><input type="number" id="izin" name="izin" required><br><br>
            <label for="sakit">Sakit:</label><input type="number" id="sakit" name="sakit" required><br><br>
            <button type="submit" class="add-button">Submit</button>
            <button type="button" onclick="hideForm()" class="delete-button">Cancel</button>
        </form>
    </div>
</div>

</body>
</html>