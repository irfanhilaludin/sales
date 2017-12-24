
<?php
 include('../dbcon.php');
dbcon(); 

$query=mysql_query("insert into tb_kontak_usul(id_user, nama_kontak, alamat_kontak, kota_kontak, provinsi_kontak, cp_kontak, telepon_kontak, fax_kontak, email_kontak, status_kontak, pembuat) values ('$_POST[id_usr]', '$_POST[nama]','$_POST[alamat]','$_POST[kota]','$_POST[provinsi]','$_POST[cp]','$_POST[telepon]','$_POST[fax]','$_POST[email]', 'menunggu', '$_POST[user]')") or die (mysql_error());

if($query){
header("location:index.php?page=data_usul");

}

?>