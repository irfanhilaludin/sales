<?php
 include('../dbcon.php');
dbcon(); 

 $po_query = mysql_query("select * from  tb_po where id_po = '$_GET[id_po]'")or die(mysql_error());
                    while($row_po = mysql_fetch_array($po_query)){


				
$query0=mysql_query("insert into tb_kirim_po (id_kontak, id_po , penerima_barang, no_telp_penerima, vol_kirim , jam_kirim, tanggal_kirim,  alamat_kirim, status_kirim,  kelengkapan_kirim) values ('$row_po[id_kontak]', '$row_po[id_po]','$row_po[penerima_barang]', '$row_po[no_telp_penerima]', '$row_po[vol_po]','$row_po[pukul_kirim]', '$row_po[tanggal_kirim]',  '$row_po[alamat_kirim]', 'belum kirim', '$row_po[kelengkapan]')") or die (mysql_error());

}

$query1=mysql_query("update tb_po set status_po ='setuju' where id_po = '$_GET[id_po]'") or die (mysql_error());

$query=mysql_query("update tb_kontak_all set report_kontak = 'PO' where id_kontak = '$_GET[id_kontak]'") or die (mysql_error());

if($query) 
echo"<script>alert('PO Berhasil disetujui')</script>";
	echo"<meta http-equiv='refresh' content='0;url=./?page=po_pending'>";
?>