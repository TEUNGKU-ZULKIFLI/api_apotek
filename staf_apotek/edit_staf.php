<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $no_hp = $_POST['no_hp'];

    $query = "UPDATE staf_apotek SET nama='$nama', alamat='$alamat', tgl_lahir='$tgl_lahir', tmp_lahir='$tmp_lahir', no_hp='$no_hp' WHERE id=$id";

    if ($connect->query($query) === TRUE) {
        echo json_encode(["success" => true, "message" => "Data berhasil diperbarui"]);
    } else {
        echo json_encode(["success" => false, "message" => "Data gagal diperbarui: " . $connect->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid Request"]);
}
?>
