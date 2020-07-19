<?php
$pdf = new FPDF('P', 'mm', array(80, 330));
//Halaman Perjanjian
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Ln(-5);
$jam = date('H:i', strtotime($nota['tanggal_taransaksi']));
$pdf->Cell(55, 6, $jam, 0, 0, 'C');
$pdf->Ln(0);
$pdf->Cell(65, 6, $nota['id_transaksi'], 0, 1, 'R');
// image logo
// $image1 = base_url() . "images/nota_logo.png";
// $pdf->Image($image1, 4.5, 4.5, 5, 5);
$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(-6);
$pdf->Cell(70, 4, 'CANDRA APPLE SOLUTION', 0, 1, 'l');
$pdf->Cell(-6);
$pdf->Cell(70, 4, 'Apple Service Center', 0, 1, 'l');
$pdf->SetFont('Arial', '', 9);
$pdf->Line(4, 20.5, 75, 20.5);
$pdf->Ln(1);
$pdf->Cell(-6);
$pdf->MultiCell(70, 4, 'Jl. Prof. Dr. Suharso Ruko Wello No.1, Arcawinangun Purwokerto Timur (GOR Satria)', 0, 'l');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(-6);
$pdf->Cell(70, 4, 'www.candra-apple-solution.com', 0, 1);
$pdf->Cell(-6);
$pdf->Cell(35, 4, 'wa : 081575403733', 0, 0);
$pdf->Cell(35, 4, 'ig : @candra_apple', 0, 1);
$pdf->Cell(-6);
$pdf->Cell(10, 4, 'Kasir', 0, 0);
$pdf->Cell(3, 4, ':', 0, 0);
$pdf->Cell(40, 4, $nota['name'], 0, 1);
// line break 
$pdf->ln(5);
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(-6);
$pdf->Cell(31, 6, 'Nota Pengambilan', 0, 1);

$pdf->Cell(-6);
$pdf->Cell(31, 6, 'Nama', 0, 0);
$pdf->Cell(3, 6, ':', 0, 0);
$pdf->Cell(40, 6, $nota['nama_pelanggan'], 0, 1);

$pdf->Cell(-6);
$pdf->Cell(31, 6, 'No HP', 0, 0);
$pdf->Cell(3, 6, ':', 0, 0);
$pdf->Cell(40, 6, '0' . $nota['no_hp'], 0, 1);

$pdf->Cell(-6);
$pdf->Cell(31, 6, 'Tanggal Masuk', 0, 0);
$pdf->Cell(3, 6, ':', 0, 0);
$date = date('Y-m-d', strtotime($nota['tanggal_taransaksi']));
$indodate_masuk = date_indo($date);
$pdf->Cell(40, 6, $indodate_masuk, 0, 1);

$pdf->Cell(-6);
$pdf->Cell(31, 6, 'Tipe Device', 0, 0);
$pdf->Cell(3, 6, ':', 0, 1);
$device = $nota['product'];
$tipe = $nota['platform'];
$tipedevice = $device . " " . $tipe;
$pdf->Cell(-6);
$pdf->MultiCell(70, 6, $tipedevice, 0, 1);
$pdf->Ln(6);
$pdf->Cell(-6);
$pdf->Cell(70, 6, 'Perjanjian :', 0, 1);
$pdf->Cell(-6);
$pdf->MultiCell(70, 6, '1.Device tidak bisa diambil tanpa nota!!
2.Nota hilang maka garansi hangus!!
3.Jika device yang diterima dalam keadaan, mati total jika dicancel maka kami kembalikan dalam keadaan mati total seperti semula.
4.Jika device yang diterima dalam keadaan bootloop / stuck logo maka kemungkinan 50% - 80% untuk di perbaiki. Jika di cancel, kemungkinan kami kembalikan dalam keadaan mati total karna jenis kerusakan fatal dan tidak bisa kami kerjakan.
5.Device yang sudah dikonfirmasi tiga kali oleh konter dan tidak diambil selama 3 bulan dianggap hilang.
6.Garansi LCD 7 hari berlaku bila plastik tidak dicopot dan tidak bergelembung.
7.Garansi hanya berlaku pada kerusakan yang sama
        ', 0, 'J');
$pdf->Cell(-6);
$pdf->Cell(20, 6, 'Hormat Kami', 0, 0, 'C');
$pdf->Cell(30, 6, '', 0, 0);
$pdf->Cell(20, 6, 'Customer', 0, 1, 'C');
$pdf->Cell(-6);
$pdf->Cell(20, 34, '', 0, 0);
$pdf->Cell(30, 34, '', 0, 0);
$pdf->Cell(20, 34, '', 0, 1);
$teks = $nota['name'];
$penerima = explode(" ", $teks);
$pdf->Cell(-6);
$pdf->Cell(20, 5, '( ' . $penerima[0] . ' )', 0, 0, 'C');
$pdf->Cell(30, 5, '', 0, 0);
$pdf->Cell(20, 5, '(' . $nota['nama_pelanggan'] . ')', 0, 1, 'C');
$pdf->Cell(-6);
$pdf->Cell(70, 7, 'Kepuasan anda kebahagian kami.', 0, 0, 'C');




// Halaman Nota
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', '', 10);
$pdf->Ln(-5);
if ($nota['tanggal_diambil'] != '0000-00-00 00:00:00') {
    $jamambl = date('H:i', strtotime($nota['tanggal_diambil']));
} else {
    $jamambl = 'Belum Diambil';
}
$pdf->Cell(55, 6, $jamambl, 0, 0, 'C');
$pdf->Ln(0);
$pdf->Cell(65, 6, $nota['id_transaksi'], 0, 1, 'R');
// image logo
// $image1 = base_url() . "images/nota_logo.png";
// $pdf->Image($image1, 4.5, 4.5, 5, 5);
$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(-6);
$pdf->Cell(70, 4, 'CANDRA APPLE SOLUTION', 0, 1, 'l');
$pdf->Cell(-6);
$pdf->Cell(70, 4, 'Apple Service Center', 0, 1, 'l');
$pdf->SetFont('Arial', '', 9);
$pdf->Line(4, 20.5, 75, 20.5);
$pdf->Ln(1);
$pdf->Cell(-6);
$pdf->MultiCell(70, 4, 'Jl. Prof. Dr. Suharso Ruko Wello No.1, Arcawinangun Purwokerto Timur (GOR Satria)', 0, 'l');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(-6);
$pdf->Cell(70, 4, 'www.candra-apple-solution.com', 0, 1);
$pdf->Cell(-6);
$pdf->Cell(35, 4, 'wa : 081575403733', 0, 0);
$pdf->Cell(35, 4, 'ig : @candra_apple', 0, 1);
$pdf->Cell(-6);
$pdf->Cell(10, 4, 'Kasir', 0, 0);
$pdf->Cell(3, 4, ':', 0, 0);
$pdf->Cell(40, 4, $nota['name'], 0, 1);
// line break 
$pdf->ln(5);
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(-6);
$pdf->Cell(31, 6, 'Bukti Pembayaran', 0, 1);

$pdf->Cell(-6);
$pdf->Cell(31, 6, 'Nama', 0, 0);
$pdf->Cell(3, 6, ':', 0, 0);
$pdf->Cell(40, 6, $nota['nama_pelanggan'], 0, 1);

$pdf->Cell(-6);
$pdf->Cell(31, 6, 'No HP', 0, 0);
$pdf->Cell(3, 6, ':', 0, 0);
$pdf->Cell(40, 6, '0' . $nota['no_hp'], 0, 1);
$pdf->Cell(-6);
$pdf->Cell(31, 6, 'Tanggal Diambil', 0, 0);
$pdf->Cell(3, 6, ':', 0, 0);
if ($nota['tanggal_diambil'] != 0) {
    $tanggal_diambil = date('Y-m-d', strtotime($nota['tanggal_diambil']));
    $indodate_diambil = date_indo($tanggal_diambil);
    $pdf->Cell(40, 6, $indodate_diambil, 0, 1);
} else {
    $pdf->Cell(40, 6, 'Belum diambil', 0, 1);
}
$pdf->ln(5);

$jumlah_barang = 0;
$jumlah_item = 0;
foreach ($item as $itm) {
    $jumlah_barang = $jumlah_barang + 1;
    $jumlah_item = $jumlah_item + $itm['quantity'];
    $pdf->Cell(-6);
    $pdf->Cell(31, 6, $itm['nama_barang'], 0, 1);
    $pdf->Cell(-6);
    $pdf->Cell(5, 6, $itm['quantity'], 0, 0);
    $pdf->Cell(5, 6, 'X', 0, 0);
    $pdf->Cell(27, 6, $itm['harga'], 0, 0);
    $pdf->Cell(0, 6, '=', 0, 0);
    $pdf->Cell(5, 6, rupiahnota($itm['total_harga']), 0, 1, 'R');
}
$pdf->Cell(-6);
$pdf->Cell(5, 6, '------------------------------------------------------------------', 0, 1);
$pdf->Cell(-6);
$pdf->Cell(12, 6, 'Barang', 0, 0);
$pdf->Cell(2, 6, ':', 0, 0);
$pdf->Cell(4, 6, $jumlah_barang, 0, 0);
$pdf->Cell(7, 6, 'Item', 0, 0);
$pdf->Cell(2, 6, ':', 0, 0);
$pdf->Cell(10, 6, $jumlah_item, 0, 0);
$pdf->Cell(0, 6, '=', 0, 0);
$pdf->Cell(5, 6, rupiahnota($nota['total']), 0, 1, 'R');
$pdf->Cell(-6);
$pdf->Cell(5, 6, '------------------------------------------------------------------', 0, 1);
$pdf->Cell(-6);
$pdf->Cell(37, 6, 'Diskon', 0, 0);
$pdf->Cell(0, 6, '=', 0, 0);
if ($nota['disc_status'] == 0) {
    $diskon = rupiahnota($nota['diskon']);
} else {
    $diskon = $nota['diskon'] . "%";
}
$pdf->Cell(5, 6, $diskon, 0, 1, 'R');
$pdf->Cell(-6);
$pdf->Cell(37, 6, 'Total', 0, 0);
$pdf->Cell(0, 6, '=', 0, 0);
$pdf->Cell(5, 6, rupiahnota($nota['grand_total']), 0, 1, 'R');
$pdf->Cell(-6);
$pdf->Cell(37, 6, 'Cash', 0, 0);
$pdf->Cell(0, 6, '=', 0, 0);
$pdf->Cell(5, 6, rupiahnota($nota['cash']), 0, 1, 'R');
$pdf->Cell(-6);
if ($nota['change_nominal'] > 0) {
    $kembalian = rupiahnota($nota['change_nominal']);
    $dp = 0;
} elseif ($nota['change_nominal'] == 0) {
    $kembalian = rupiahnota(0);
    $dp = $nota['grand_total'] - $nota['cash'];
} else {
    $kembalian = 'Pembayaran Kurang';
    $dp = $nota['grand_total'] - $nota['cash'];
}
$pdf->Cell(37, 6, 'Kembalian', 0, 0);
$pdf->Cell(0, 6, '=', 0, 0);
$pdf->Cell(5, 6, $kembalian, 0, 1, 'R');

if ($nota['cash'] == 0) {
    $dp = rupiahnota(0);
} elseif ($kembalian >= $nota['grand_total']) {
    $dp = 'Lunas';
} else {
    $dp = rupiahnota($nota['cash']);
}

$pdf->Cell(-6);
$pdf->Cell(37, 6, 'DP', 0, 0);
$pdf->Cell(0, 6, '=', 0, 0);
$pdf->Cell(5, 6, $dp, 0, 1, 'R');

$pdf->ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(-6);
$pdf->MultiCell(70, 6, 'Barang yang sudah dibeli tidak bisa dikembalikan!!', 0, 'L');

$pdf->Output('', $nota['nama_pelanggan'] . ' ' . $nota['id_transaksi'] . '.pdf', false);
