<?php
require_once('koneksi.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $jenis= $_POST['akreditasi'];
    //$warna = $_POST['warna'];

    if (empty($nama)|| empty($jenis)) {
        echo "Tidak Boleh Kosong...";
    }

    elseif(!preg_match("/^[a-zA-z]*$/", $nama)){
        echo "Nama Kampus tidak boleh angka";
    } else {

    $sql = "INSERT INTO tb_kampus (kode,nama,akreditasi) VALUES ('$kode','$nama','$akreditasi')";


    if(mysqli_query($con,$sql)){
        echo 'Berhasil Menambah';
    }else{
        echo 'Gagal Menambah';
    }
}
    mysqli_close($con);
}
?>