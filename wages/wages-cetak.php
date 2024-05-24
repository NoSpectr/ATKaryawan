<?php
include('../koneksi.php');
require_once("../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT * FROM tb_gaji");
$html = '<center><h3>Data Gaji</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Tanggal Pembayaran</th>
                <th>Gaji Pokok</th>
                <th>Status Pembayaran</th>
            </tr>';
$no = 1;
while ($gaji = mysqli_fetch_array($query)) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . $gaji['nama_karyawan'] . "</td>
                <td>" . $gaji['jabatan'] . "</td>
                <td>" . $gaji['tgl_pembayaran'] . "</td>
                <td>Rp. " . number_format($gaji['gaji_pokok']) . "</td>
                <td>" . $gaji['status_pembayaran'] . "</td>
            </tr>";
    $no++;
}
$html .= "</table>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan-gaji.pdf');
