<?php
include('../dbcon.php');
dbcon()
$term = trim(strip_tags($_GET['term']));
аа
$qstring = "SELECT * FROM tb_kontak_all WHERE nama_anime LIKE '".$term."%'";
//query database untuk mengecek tabel anime 
$result = mysql_query($qstring);
аа
while ($row = mysql_fetch_array($result))
{
аааа$row['value']=htmlentities(stripslashes($row['nama_kontak']));
аааа$row['id']=(int)$row['id_kontak'];
//buat array yang nantinya akan di konversi ke json
аааа$row_set[] = $row;
}
//data hasil query yang dikirim kembali dalam format json
echo json_encode($row_set);
?>