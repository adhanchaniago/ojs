<?php 
if (isset($_GET[delete])){
	mysql_query("DELETE FROM tbl_journal where id_journal='$_GET[delete]'");
	echo "<script>document.location='my-journal.mu';</script>";
}
?>

<div class="row">
	<div class="col-md-12">
		<article>	
		<div class="alert alert-success">
		<?php 
				echo "Semua Daftar Journal Anda '<strong>$data[nama]</strong>'";
		?>
	    </div>
	    <a href='index.php?view=myjournal&act=tambah' class='btn btn-primary btn-sm' style='margin-bottom:2px'>Tambahkan Journal Baru</a>
	    <table class="table table-condensed table-bordered">
		      <thead>
		        <tr class="alert alert-success">
		        	<th scope="row">No</th> 
		        	<th>Judul</th>	
		        	<th>Tanggal</th>	
		        	<th>Kategori</th>
		        	<th>Review</th>
		        	<th>Editor</th>
		        	<th>Status</th>
		        	<th>Action</th>
		        </tr>
		      </thead>
		      <tbody>
			<?php 		
				$p      = new Paging;
				$batas  = 10;
				$posisi = $p->cariPosisi($batas);
				$no = $posisi+1;
					$journal = mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen
												JOIN tbl_kategori c ON a.id_kategori=c.id_kategori where a.id_dosen='$_SESSION[id]' ORDER BY a.id_journal DESC LIMIT $posisi, $batas");
				while ($j = mysql_fetch_array($journal)){
					if ($j[status]=='1'){
						$status = '<span class="text-success">Published</span>';
					}else{
						$status = '<span class="text-danger">Unpublished</span>';
					}

					if ($j[review]=='1'){
						$review = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
					}else{
						$review = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
					}

					if ($j[editor]=='1'){
						$editor = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
					}else{
						$editor = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
					}

					$ex = explode(' ',$j[waktu_kirim]);

					echo "<tr><td>$no</td>
							  <td><a href='detail-journal-$j[id_journal].mu'>$j[judul]</a></td>
							  <td>".tgl_indo($ex[0])."</td>
							  <td>$j[nama_kategori]</td>
							  <td>$review</td>
							  <td>$editor</td>
							  <td>$status</td>
							  <td>
							  	  <a href='index.php?view=myjournal&act=edit&id=$j[id_journal]' class='btn btn-success btn-xs'>Edit</a>
							  	  <a href='index.php?view=myjournal&delete=$j[id_journal]' class='btn btn-danger btn-xs'>Delete</a>
							  </td>
						  </tr>";
					$no++;
				}
					$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM tbl_journal where id_dosen='$_SESSION[id]'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
			?>
			  </tbody>
		</table>
					<nav>
 						<ul class="pagination">
							<?php echo $linkHalaman ?>
						</ul>
					</nav>
		</article>
	</div>
</div>