<div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Tracking</h2>
                        
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                       Data Tracking
                        </p>
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Nama Perusahaan</th>
                              <th>User</th>
                              <th>Telepon</th>
                              <th>Penawaran</th>
                              <th>PO</th>
                              <th>Kirim</th>
                              <th>Bayar</th>
                              <th>Tgl Bagi</th>
                             </tr>
                          </thead>
                          <tbody>
                          <!-----------------------------------Content------------------------------------>
                           <?php

$tracking = mysql_query("select * from tb_set")or die(mysql_error());
while($row_tracking = mysql_fetch_array($tracking)){


$pelanggan_query = mysql_query("select * from tb_kontak_all where id_kontak = '$row_tracking[id_kontak]' ")or die(mysql_error());
$row = mysql_fetch_array($pelanggan_query);


$user_query = mysql_query("select * from tb_user where id_user = '$row_tracking[id_user]' ")or die(mysql_error());
$row_user = mysql_fetch_array($user_query);

$pn_query = mysql_query("select * from tb_penawaran where id_penawaran = '$row_tracking[id_penawaran]' ")or die(mysql_error());
$row_pn = mysql_fetch_array($pn_query);
$jum_pn = mysql_num_rows($pn_query);

$po_query = mysql_query("select * from tb_po where id_po= '$row_tracking[id_po]' ")or die(mysql_error());
$row_po = mysql_fetch_array($po_query);
$jum_po = mysql_num_rows($po_query);

$kirim_query = mysql_query("select * from tb_kirim_po where id_kirim_po = '$row_tracking[id_kirim]' ")or die(mysql_error());
$row_kirim = mysql_fetch_array($kirim_query);
$jum_kirim = mysql_num_rows($kirim_query);

$bayar_query = mysql_query("select * from tb_pembayaran where id_pembayaran = '$row_tracking[id_bayar]' ")or die(mysql_error());
$row_kirim = mysql_fetch_array($bayar_query);
$jum_kirim = mysql_num_rows($bayar_query);


?>
<tr>

<td><a href=""><?php echo $row['nama_kontak']; ?></a></td>
<td><?php echo $row_user['nama_user']; ?></td>
<td><?php 
if($row['status_kontak']=='telah dihubungi')
{
echo '<div class="fa fa-check"></div>';
}
else if($row['status_kontak']=='belum dihubungi')
{
echo '<div class="fa fa-close"></div>';
}
else
{
echo '<div class="fa fa-close"></div>';
};

?>
</td>
<td>
<?php 
if($row_pn['id_kontak']<> Null)
{
echo '<div class="fa fa-check"> </div>';
}
else
{
echo '<div class="fa fa-close"></div>';
};

?>

</td>
<td>
<?php 
if($row_po['id_pelanggan']<> Null)
{
echo '<div class="fa fa-check"> </div>';
}
else
{
echo '<div class="fa fa-close"></div>';
};

?>

</td>
<td>
<?php 
if($row_kirim['id_pelanggan']<> Null)
{
echo '<div class="fa fa-check"> </div>';
}
else
{
echo '<div class="fa fa-close"></div>';
};

?>

</td>
<td>
<?php 
if($row_kirim['id_kontak']<> Null)
{
echo '<div class="fa fa-check"> </div>';
}
else
{
echo '<div class="fa fa-close"></div>';
};

?>

</td>
<td><?php echo $row_tracking['tgl_set']; ?></td>

</tr>

<?php 
}?>  
                          </tbody>
                        </table>

                      </div>
                    </div>
                  </div>