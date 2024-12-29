<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_perusahaan = $_POST['kode_perusahaan'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat_perusahaan = $_POST['alamat_perusahaan'];
    $email = $_POST['email'];
    $no_kontak = $_POST['no_kontak'];

    $query = "UPDATE pemasok SET nama_perusahaan='$nama_perusahaan', alamat_perusahaan='$alamat_perusahaan', email='$email', no_kontak='$no_kontak' WHERE kode_perusahaan='$kode_perusahaan'";

    if ($connect->query($query) === TRUE) {
        echo json_encode(["success" => true, "message" => "Data berhasil diperbarui"]);
    } else {
        echo json_encode(["success" => false, "message" => "Gagal memperbarui data: " . $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid Request"]);
}
?>
