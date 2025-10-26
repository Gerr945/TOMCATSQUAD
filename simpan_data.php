<?php
// Konfigurasi database
$host     = "localhost";
$user     = "root";
$password = "";
$dbname   = "website_data";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah ini kirim komentar atau pendaftaran
if (isset($_POST['tipe']) && $_POST['tipe'] === "komentar") {

    // ----- Simpan komentar -----
    if (isset($_POST['nama']) && isset($_POST['komentar'])) {
        $nama     = $conn->real_escape_string($_POST['nama']);
        $komentar = $conn->real_escape_string($_POST['komentar']);

        $sql = "INSERT INTO komentar (nama, komentar) VALUES ('$nama', '$komentar')";
        echo $conn->query($sql) ? "Komentar berhasil disimpan!" : "Gagal menyimpan komentar: " . $conn->error;
    } else {
        echo "Data komentar tidak lengkap.";
    }

} else {

    // ----- Simpan pendaftaran -----
    if (
        isset($_POST['nama']) &&
        isset($_POST['email']) &&
        isset($_POST['telepon']) &&
        isset($_POST['jenjang']) &&   // huruf kecil semua, biar sesuai
        isset($_POST['jurusan']) &&
        isset($_POST['kelas']) &&
        isset($_POST['program']) &&
        isset($_POST['pesan'])
    ) {
        $nama     = $conn->real_escape_string($_POST['nama']);
        $email    = $conn->real_escape_string($_POST['email']);
        $telepon  = $conn->real_escape_string($_POST['telepon']);
        $jenjang  = $conn->real_escape_string($_POST['jenjang']);
        $jurusan  = $conn->real_escape_string($_POST['jurusan']);
        $kelas    = $conn->real_escape_string($_POST['kelas']);
        $program  = $conn->real_escape_string($_POST['program']);
        $pesan    = $conn->real_escape_string($_POST['pesan']);

        $sql = "INSERT INTO formulir (nama, email, telepon, jenjang, jurusan, kelas, program, pesan) 
                VALUES ('$nama', '$email', '$telepon', '$jenjang', '$jurusan', '$kelas', '$program', '$pesan')";

        echo $conn->query($sql)
            ? "Pendaftaran berhasil disimpan!"
            : "Gagal menyimpan pendaftaran: " . $conn->error;

    } else {
        echo "Data pendaftaran tidak lengkap.";
    }
}

$conn->close();
?>
