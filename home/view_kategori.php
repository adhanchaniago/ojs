<div class="row">
	<div class="col-md-12">
		<article>	
		<div class="alert alert-success">
		<?php 
			$k = mysql_fetch_array(mysql_query("SELECT * FROM tbl_kategori where id_kategori='$_GET[kat]'"));
				echo "Daftar Journal dengan kategori <strong>'$k[nama_kategori]'</strong>";
		?>
	    </div>
			<?php 		
				$p      = new Paging2;
				$batas  = 5;
				$posisi = $p->cariPosisi($batas);
				$no = $posisi+1;
					$journal = mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen
												JOIN tbl_kategori c ON a.id_kategori=c.id_kategori where a.status='1' AND a.id_kategori='$_GET[kat]' ORDER BY a.id_journal DESC LIMIT $posisi, $batas");
				while ($j = mysql_fetch_array($journal)){
					$abstrack = substr($j[abstrak],0,550);
					echo "<h1 class='title'>$j[judul]</h1>
					      <b class='paragraph' style='color:red'> $j[nama]</b>
					      <a class='pull-right btn btn-success btn-xs' href=''>$j[nama_kategori]</a>
					      <p class='paragraph'><b class='btn btn-link btn-xs'>Abstract</b> - $abstrack.. <a href='detail-journal-$j[id_journal].mu' class='btn btn-link btn-xs'>[ Read More ]</a></p>";
				}

					$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM tbl_journal where status='1' AND id_kategori='$_GET[kat]'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halkat], $jmlhalaman);
			?>

					<nav>
 						<ul class="pagination">
							<?php echo $linkHalaman ?>
						</ul>
					</nav>
		</article>
	</div>
</div>