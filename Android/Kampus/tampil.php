<?php

//import file koneksi database
require_once('koneksi.php');

//membuat sql query
$sql = "SELECT * FROM tb_kampus";
//mendapatkan hasil
$r = mysqli_query($con,$sql);
//membuat array kosong
$result = array();

while($row = mysqli_fetch_array($r))
{
    //memasukan nama dan id kedalam array kosong yang telah di buat
    array_push($result,array(
        "kode"=>$row['kode'],
        "nama"=>$row['nama']
    ));
}

//menampilkan array dalam format json
echo json_encode(array('result'=>$result));
mysqli_close($con);
?>