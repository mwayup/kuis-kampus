<?php

    require_once('koneksi.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $akreditasi = $_POST['akreditasi'];
    //$alamat = $_POST['alamat'];
    if (empty($nama)|| empty($jenis)||empty($kode)) {
        echo "Tidak Boleh Kosong...";
    }

    elseif(!preg_match("/^[a-zA-z]*$/", $nama)){
        echo "Nama tidak boleh angka";
    } else {



    $sql = "UPDATE tb_mahasiswa SET nama = '$nama', nim = '$jenis' WHERE id = '$kode';";

    if(mysqli_query($con,$sql)){
        echo 'Berhasil Update Data Mahasiswa';
    }else{
        echo 'Gagal Update Data Mahasiswa';
    } 
}
    mysqli_close($con);
}
?>