<?php 
if (isset($_POST[simpana])){
  mysql_query("INSERT INTO tbl_kategori VALUES('','$_POST[a]')");
  echo "<script>document.location='index.php?view=kategorijournal';</script>";
}

if(isset($_POST[updatea])){
  mysql_query("UPDATE tbl_kategori SET nama_kategori = '$_POST[a]' where id_kategori='$_POST[aa]'");
  echo "<script>document.location='index.php?view=kategorijournal';</script>";
}

if(isset($_GET[deletea])){
  mysql_query("DELETE FROM tbl_kategori where id_kategori='$_GET[deletea]'");
  echo "<script>document.location='index.php?view=kategorijournal';</script>";
}
?>
  <div class="alert alert-danger">
        Semua Daftar Kategori Journal
    </div>
      <a style='margin-bottom:5px' class='btn btn-primary btn-sm' href='#' data-toggle="modal" data-target="#tambahkategori">Tambahkan Data</a>
    <table class="table table-condensed table-hover">
      <thead>
        <tr class="alert alert-success">
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      <?php 
        $p      = new Paging;
        $batas  = 10;
        $posisi = $p->cariPosisi($batas);
        $no = $posisi+1;
        $kategori = mysql_query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC LIMIT $posisi,$batas");
          while ($r = mysql_fetch_array($kategori)){
          echo "<tr>
              <th width=50px>$no</th>
              <td>$r[nama_kategori]</td>
              <td width=110px><a class='open-AddBookDialog btn btn-success btn-xs' data-id='$r[id_kategori]' data-id1='$r[nama_kategori]' data-toggle='modal' href='#' data-target='#editkategori'>Edit</a>
                  <a class='btn btn-danger btn-xs' href='index.php?view=kategorijournal&deletea=$r[id_kategori]'>Delete</a>
              </td>
               </tr>
               </tbody>";
          $no++;
        }
          $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM tbl_kategori"));
          $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
          $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
      ?>
    </table>
          <nav>
            <ul class="pagination">
              <?php echo $linkHalaman ?>
            </ul>
          </nav>

<?php if (isset($_SESSION[admin])){  ?>
      <!-- Modal Master Data Perkara -->
    <div class="modal fade" id="tambahkategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Kategori</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=kategorijournal" method='POST'>
                <div class="form-group">
                  <label for="a" class="col-sm-3 control-label">Kategori</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id='a' name="a" required>
                  </div>
                </div>

          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='simpana' class="btn btn-primary btn-sm">Tambahkan</button>
          </div>
          </form>
        </div>
      </div>
    </div>


    <!-- Modal Master Data Perkara -->
    <div class="modal fade" id="editkategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Kategori</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=kategorijournal" method='POST'>
                <div class="form-group">
                  <label for="a" class="col-sm-3 control-label">Kategori</label>
                  <div class="col-sm-8">
                    <input type="hidden" class="form-control" id='bookId' name="aa" required>
                    <input type="text" class="form-control" id='bookId1' name="a" required>
                  </div>
                </div>
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='updatea' class="btn btn-primary btn-sm">Update</button>
          </div>
          </form>
        </div>
      </div>
    </div>
<?php } ?>