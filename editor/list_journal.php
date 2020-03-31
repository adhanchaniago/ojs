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
				echo "Semua Daftar Journal";
		?>
	    </div>
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
												JOIN tbl_kategori c ON a.id_kategori=c.id_kategori ORDER BY a.id_journal DESC LIMIT $posisi, $batas");
				while ($j = mysql_fetch_array($journal)){
					if ($j[status]=='3'){
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
							  <td style='background:#fefcca'>$editor</td>
							  <td><b>$status</b></td>
							  <td>
							  	  <a href='detail-journal-$j[id_journal].mu' class='btn btn-info btn-xs'>Detail</a>
							  	  <a href='index.php?view=myjournal&act=edit&id=$j[id_journal]' class='btn btn-success btn-xs'>Edit</a>";
							  	  if ($j[editor]=='1'){
							  	  	  echo "<a title='Unapproved This Journal' href='index.php?view=listjournaleditor&journal=$j[id_journal]&publish=0' style='width:35px; margin-left:5px' class='btn btn-warning btn-xs' onclick=\"return confirm('Are You Sure Unpublish this Journal?')\"><i class='glyphicon glyphicon-thumbs-down'></i></a> ";
							  	  }else{
								  	  echo "<a title='Approved This Journal' href='index.php?view=listjournaleditor&journal=$j[id_journal]&publish=1' style='width:35px; margin-left:5px' class='btn btn-info btn-xs' onclick=\"return confirm('Are You Sure Publish this Journal?')\"><i class='glyphicon glyphicon-thumbs-up'></i></a> ";
								  }
							  echo "</td>
						  </tr>";
					$no++;
				}
					$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM tbl_journal"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					if (isset($_GET[publish])){
						mysql_query("UPDATE tbl_journal SET editor='$_GET[publish]' where id_journal='$_GET[journal]'");
						echo "<script>document.location='editor-list-journal.mu';</script>";
					}
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