<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_obat = $_POST['kode_obat'];
    $jenis_obat = $_POST['jenis_obat'];
    $kode_perusahaan = $_POST['kode_perusahaan'];
    $jumlah_obat_masuk = $_POST['jumlah_obat_masuk'];
    $no_rak_obat = $_POST['no_rak_obat'];
    $tgl_obat_masuk = $_POST['tgl_obat_masuk'];
    $kode_pemesan = $_POST['kode_pemesan'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $jumlah_pesanan_obat = $_POST['jumlah_pesanan_obat'];
    $tgl_obat_keluar = $_POST['tgl_obat_keluar'];

    $query = "INSERT INTO stock_obat_in_out (kode_obat, jenis_obat, kode_perusahaan, jumlah_obat_masuk, no_rak_obat, tgl_obat_masuk, kode_pemesan, nama_pemesan, jumlah_pesanan_obat, tgl_obat_keluar)
    VALUES ('$kode_obat', '$jenis_obat', '$kode_perusahaan', '$jumlah_obat_masuk', '$no_rak_obat', '$tgl_obat_masuk', '$kode_pemesan', '$nama_pemesan', '$jumlah_pesanan_obat', '$tgl_obat_keluar')";

    if ($connect->query($query) === TRUE) {
        echo json_encode(["success" => true, "message" => "Data berhasil ditambahkan"]);
    } else {
        echo json_encode(["success" => false, "message" => "Gagal menambahkan data: " . $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid Request"]);
}
