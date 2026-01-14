<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// ambil data formulir
$result = $conn->query("SELECT * FROM formulir ORDER BY tanggal DESC");

$html = '
<h2 style="text-align:center">Data Pendaftaran Eskul TOMCAT SQUAD</h2>
<table border="1" cellpadding="6" cellspacing="0" width="100%">
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Telepon</th>
    <th>Jenjang</th>
    <th>Jurusan</th>
    <th>Kelas</th>
    <th>Program</th>
    <th>Pesan</th>
    <th>Tanggal</th>
</tr>
';

while ($row = $result->fetch_assoc()) {
    $html .= "
    <tr>
        <td>{$row['id']}</td>
        <td>{$row['nama']}</td>
        <td>{$row['email']}</td>
        <td>{$row['telepon']}</td>
        <td>{$row['jenjang']}</td>
        <td>{$row['jurusan']}</td>
        <td>{$row['kelas']}</td>
        <td>{$row['program']}</td>
        <td>{$row['pesan']}</td>
        <td>{$row['tanggal']}</td>
    </tr>
    ";
}

$html .= '</table>';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("formulir_eskul.pdf", ["Attachment" => false]);
exit;
