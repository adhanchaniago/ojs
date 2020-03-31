<!-- Modal cari Nomor Perkara dalam -->
<div class="modal fade" id="tambahrevisi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambahkan Revisi Baru</h4>
      </div>
      <div class="modal-body">
          <form action='detail-journal-<?php echo $_GET[journal]; ?>.mu' method='POST'>
            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Catatan</label>
              <div class="input-group col-lg-10">
                <textarea name='a' class='form-control' style='width:100%; height:250px'></textarea>
              </div>
            </div>
      </div>
      <div style='clear:both' class="modal-footer">
        <button type="submit" name='simpan' class="btn btn-primary btn-sm">Tambahkan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal cari Nomor Perkara dalam -->
<div class="modal fade" id="tambahrevisii" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambahkan Revisi Baru</h4>
      </div>
      <div class="modal-body">
          <form action='detail-journal-<?php echo $_GET[id]; ?>.mu' method='POST'>
            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Catatan</label>
              <div class="input-group col-lg-10">
                <textarea name='a' class='form-control' style='width:100%; height:250px'></textarea>
              </div>
            </div>
      </div>
      <div style='clear:both' class="modal-footer">
        <button type="submit" name='simpan' class="btn btn-primary btn-sm">Tambahkan</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal cari Nama Pihak Perkara dalam -->
<div class="modal fade" id="pihakperkara" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cari Nama Pihak Perkara Dalam</h4>
      </div>
      <div class="modal-body">
          <form action='hasil-pencarian-nama-perkara.mu' method='POST'>
            <div class="form-group col-sm-12">
              <label class="col-sm-3 control-label">Nama Pihak</label>
              <div class="input-group">
                <input style='margin-top:-5px; width:390px' type="text" value='<?php echo $f; ?>' class="form-control" name="f" placeholder='Nama Pihak Perkara Masih Kosong,..' required>
              </div>
            </div>
      </div>
      <div style='clear:both' class="modal-footer">
        <button type="submit" name='cari' class="btn btn-primary btn-sm">Cari Perkara</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal cari Keuangan Perkara -->
<div class="modal fade" id="keuanganperkara" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cari Keuangan Perkara Dalam</h4>
      </div>
      <div class="modal-body">
          <form action='detail-keuangan-perkara.mu' method='POST'>
            <div class="form-group col-sm-12">
              <label class="col-sm-3 control-label">Nomor Perkara</label>
              <div class="input-group">
                <input style="width:20%" type="text" value='<?php echo $a; ?>' class="form-control" name="a" minlength="4" placeholder='All'>
                <select style="width:24%" name="b" class="form-control">
                <option value='' selected>All</option>
                  <?php $pdt = mysql_query("SELECT * FROM rb_master_pdt");
                    while ($r = mysql_fetch_array($pdt)){
                    if ($b == $r['id_master_pdt']){
                      echo "<option value='$r[id_master_pdt]' selected>$r[nama_pdt]</option>";
                    }else{
                      echo "<option value='$r[id_master_pdt]'>$r[nama_pdt]</option>";
                    }
                  } ?>
                </select>

                <select style="width:24%" name="c" class="form-control"> 
                  <option value="" selected="">All</option>
                  <?php for($n=2010; $n<=date("Y"); $n++){ 
                    if ($c == $n){
                      echo "<option value='$n' selected>$n</option>";
                    }else{
                      echo "<option value='$n'>$n</option>";
                    }
                  } ?>
                </select>

                <select style="width:24%" name="d" class="form-control"> 
                <option value='' selected>All</option>
                  <?php $pa = mysql_query("SELECT * FROM rb_master_pa");
                    while ($r = mysql_fetch_array($pa)){
                    if ($d == $r['id_master_pa']){
                      echo "<option value='$r[id_master_pa]' selected>$r[nama_pa]</option>";
                    }else{
                      echo "<option value='$r[id_master_pa]'>$r[nama_pa]</option>";
                    }
                  } ?>
                </select>   
              </div>
            </div>
      </div>
      <div style='clear:both' class="modal-footer">
        <button type="submit" name='cari' class="btn btn-primary btn-sm">Cari Perkara</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal cari Nomor Perkara dan nama pihak luar -->
<div class="modal fade" id="perkaraluar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cari No Perkara Luar</h4>
      </div>
      <div class="modal-body">
          <form action='index.mu' method='POST'>
            <div class="form-group col-sm-12">
              <label class="col-sm-3 control-label">Nomor Perkara</label>
              <div class="input-group">
                <input style="width:20%" type="text" value='<?php echo $a; ?>' class="form-control" name="a" minlength="4" placeholder='All'>
                <select style="width:24%" name="b" class="form-control">
                <option value='' selected>All</option>
                  <?php $pdt = mysql_query("SELECT * FROM rb_master_pdt");
                    while ($r = mysql_fetch_array($pdt)){
                    if ($b == $r['id_master_pdt']){
                      echo "<option value='$r[id_master_pdt]' selected>$r[nama_pdt]</option>";
                    }else{
                      echo "<option value='$r[id_master_pdt]'>$r[nama_pdt]</option>";
                    }
                  } ?>
                </select>

                <select style="width:24%" name="c" class="form-control"> 
                  <option value="" selected="">All</option>
                  <?php for($n=2010; $n<=date("Y"); $n++){ 
                    if ($c == $n){
                      echo "<option value='$n' selected>$n</option>";
                    }else{
                      echo "<option value='$n'>$n</option>";
                    }
                  } ?>
                </select>

                <select style="width:24%" name="d" class="form-control"> 
                <option value='' selected>All</option>
                  <?php $pa = mysql_query("SELECT * FROM rb_master_pa");
                    while ($r = mysql_fetch_array($pa)){
                    if ($d == $r['id_master_pa']){
                      echo "<option value='$r[id_master_pa]' selected>$r[nama_pa]</option>";
                    }else{
                      echo "<option value='$r[id_master_pa]'>$r[nama_pa]</option>";
                    }
                  } ?>
                </select>   
              </div>

              <label class="col-sm-3 control-label">Nama Pihak</label>
              <div class="input-group">
                <input style='margin-top:3px; width:371px' type="text" value='<?php echo $f; ?>' class="form-control" name="f" placeholder='Nama Pihak Perkara Masih Kosong,..'>
              </div>
            </div>
      </div>
      <div style='clear:both' class="modal-footer">
        <button type="submit" name='cari' class="btn btn-primary btn-sm">Cari Perkara</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Permohonan Perkara luar -->
<div class="modal fade" id="permohonanperkaraluar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Permohonan Bantuan Panggilan</h4>
      </div>
      <div class="modal-body">
          <form action='permohonan-bantuan.mu' method='POST'>
            <div class="form-group col-sm-12">
              <label class="col-sm-3 control-label">Nomor Perkara</label>
              <div class="input-group">
                <input style="width:20%" type="text" value='<?php echo $a; ?>' class="form-control" name="a" minlength="4">
                <select style="width:24%" name="b" class="form-control">
                <option value='' selected>- Pilih -</option>
                  <?php $pdt = mysql_query("SELECT * FROM rb_master_pdt");
                    while ($r = mysql_fetch_array($pdt)){
                    if ($b == $r['id_master_pdt']){
                      echo "<option value='$r[id_master_pdt]' selected>$r[nama_pdt]</option>";
                    }else{
                      echo "<option value='$r[id_master_pdt]'>$r[nama_pdt]</option>";
                    }
                  } ?>
                </select>

                <select style="width:24%" name="c" class="form-control"> 
                  <option value="" selected="">- Pilih -</option>
                  <?php for($n=2010; $n<=date("Y"); $n++){ 
                    if ($c == $n){
                      echo "<option value='$n' selected>$n</option>";
                    }else{
                      echo "<option value='$n'>$n</option>";
                    }
                  } ?>
                </select>

                <select style="width:24%" name="d" class="form-control"> 
                <option value='' selected>- Pilih -</option>
                  <?php $pa = mysql_query("SELECT * FROM rb_master_pa");
                    while ($r = mysql_fetch_array($pa)){
                    if ($d == $r['id_master_pa']){
                      echo "<option value='$r[id_master_pa]' selected>$r[nama_pa]</option>";
                    }else{
                      echo "<option value='$r[id_master_pa]'>$r[nama_pa]</option>";
                    }
                  } ?>
                </select>   
              </div>

              <label class="col-sm-3 control-label">Jenis Relaas</label>
              <div class="input-group">
                <select style="margin-top:3px" name="jr" class="form-control"> 
                <option value='' selected>- Pilih -</option>
                  <?php $relaas = mysql_query("SELECT * FROM rb_master_jenis_relaas where status_tampil='1'");
                    while ($r = mysql_fetch_array($relaas)){
                    if ($jr == $r['id_master_jenis_relaas']){
                      echo "<option value='$r[id_master_jenis_relaas]' selected>$r[nama_jenis_relaas]</option>";
                    }else{
                      echo "<option value='$r[id_master_jenis_relaas]'>$r[nama_jenis_relaas]</option>";
                    }
                  } ?>
                </select>
              </div>
            </div>
      </div>
      <div style='clear:both' class="modal-footer">
        <button type="submit" name='cari' class="btn btn-primary btn-sm">Cari Perkara</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal File Tidak Ditemukan -->
<div class="modal fade" id="download" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pemberitahuan !!!</h4>
      </div>
      <div class="modal-body">
         <center>Maaf, file yang ingin Anda download tidak tersedia <br>
                  atau filenya (direktorinya) telah diproteksi.<br><br><br>
          </center>
      </div>
    </div>
  </div>
</div>

