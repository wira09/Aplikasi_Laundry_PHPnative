<html>
<head>
</head>
<body>
</body>
<table id="table" border="2" class="table table-striped table-bordered  table-responsive" >
	<thead>
		<tr>

			<th>No.</th>
			<th>Tanggal</th>
			<th>Nama</th>

		</tr>
	</thead>
	<tbody>
      <?php
        include "include/koneksi.php";
        $myn = 0;
        $i = 0 + 1;
        $sql = mysqli_query($conn, "SELECT transaksi.*, count(transaksi.Id_Identitas) as baru, pelanggan.Nama FROM transaksi join pelanggan where transaksi.No_Identitas = pelanggan.No_Identitas  GROUP BY transaksi.Id_Identitas ORDER BY `No_Order` DESC");
        $cek = mysqli_fetch_assoc($sql);
        If($cek['baru'] == 1){
       		while ($hasil = mysqli_fetch_array($sql)) { ?>
  <tr>
      <td style="text-align: center;"><?php echo $i; ?></td>
      <td><?php echo $hasil['Tgl_Terima']; ?></td>
      <td><?php echo $hasil['Nama']; ?></td>
    </tr>
       <?php
      $i++;
      } }  ?>
	</tbody>
	<tfoot></tfoot>
</table>
</html>
<script>
    $(document).ready(function() {
     $('#table').DataTable();
  } );
</script>
</body>
</html>
