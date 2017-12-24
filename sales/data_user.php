<div class="col-md-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Data User</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
<a class="btn btn-app btn-xs" href="?page=tambah_user" ><i class="fa fa-plus">
    </i></a>


<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0">

<thead>

<tr>


					<th>Kode</th>
                    <th>Nama</th>
					<th>No. HP</th>
   <th>Level</th>	
                    <th>Aksi</th>
</tr>

</thead>

<tbody>
<!-----------------------------------Content------------------------------------>
 <?php
		$device_query = mysql_query("select * from tb_user")or die(mysql_error());
		while($row = mysql_fetch_array($device_query)){
		$id = $row['id_user'];

		?>
<tr class="odd gradeX">
<td><?php echo $row['kode_user']; ?></td>
<td><?php echo $row['nama_user']; ?></td>
        		<td><?php echo $row['hp_user']; ?></td>

			<td>	   
						<?php echo $row['level_user'];  ; ?>
			</td>
			
			<td>
           <?php echo"<a href='del_user.php?id_user= $row[id_user]' onClick=\"return confirm('Anda yakin ingin menghapusnya?')\" class='btn btn-default' >Hapus</a>" ?>
			<a href="?page=edit_user&id_user= <?php echo $row['id_user']; ?>" class="btn btn-default" >Edit</a>
            </td>		
            
</tr>

<?php 
}?>  


</tbody>

</table>







</div>

</div>

</div>