<?php 
	if (isset($_POST[submit])){
		$sekarangi = date("Y-m-d H:i:s");
		$dir_gambar = 'asset/files/';
		$filename = basename($_FILES['d']['name']);
		$filenamee = date("Ymd").'-'.basename($_FILES['d']['name']);
		$uploadfile = $dir_gambar . $filenamee;

		if ($filename != ''){
			if (move_uploaded_file($_FILES['d']['tmp_name'], $uploadfile)) {
				mysql_query("INSERT INTO tbl_journal VALUES('','$_SESSION[id]','$_POST[a]','$_POST[b]','$_POST[c]','$filenamee','0','0','$sekarangi')");
			}
		}else{
				mysql_query("INSERT INTO tbl_journal VALUES('','$_SESSION[id]','$_POST[a]','$_POST[b]','$_POST[c]','','0','0','$sekarangi')");
		}
		echo "<script>document.location='index.php?view=journaladmin';</script>";
	}
?>
<div class="row">
	<div class="col-md-12">
		<article>	
		<div class="alert alert-success">
		<?php 
				echo "Tambahkan Journal Baru'";
		?>
	    </div>
	    <form action='' method='POST' class="form-horizontal" role="form" enctype='multipart/form-data'>
							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>Kategori</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-5">
								  	<select class="form-control " name='a'>
								  		<option value='0'>- Pilih -</option>
								  			<?php 
								  				$kategori = mysql_query("SELECT * FROM tbl_kategori");
								  				while ($k = mysql_fetch_array($kategori)){
								  					echo "<option value='$k[id_kategori]'>$k[nama_kategori]</option>";
								  				}
								  			?>
								  	</select>
								  </div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>Judul</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-12"><input type="text" class="form-control " name='b' placeholder="Judul Journal..." required></div>
								</div>
							  </div>
							  
							  
							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-2 control-label'>Abstrak</label>
								<div class="input-group col-lg-10">
								  	<div class="col-lg-12"><textarea style='width:100%; height:200px' class="form-control" name='c' required></textarea></div>
								</div>
							  </div>
							  
							  <div class="form-group">
								<label for='inputEmail3' class='col-sm-2 control-label'>File</label>
								<div class="input-group col-lg-9">
								  	<div class="col-lg-7"><input type="file" class="form-control" name='d'></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'></label>
								<div class="col-sm-offset col-sm-9"><hr>
								  <button type="submit" name='submit' class="btn btn-success">Submit</button><br><br>
								</div>
							  </div>
						</form>
					
		</article>
	</div>
</div>