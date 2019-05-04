<?php

$kode = @$_GET['kode'];

require_once('koneksi.php');

$sql = "SELECT * FROM tb_kampus WHERE kode=$kode";

$r = mysqli_query($con,$sql);

$result = array();
@$row = mysqli_fetch_array($r);
array_push($result,array(
    "kode"=>$row['kode'],
    "nama"=>$row['nama'],
    "akreditasi"=>$row['akreditasi'],
));

echo json_encode(array('result'=>$result));
mysqli_close($con);
?>