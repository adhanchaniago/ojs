<?php 
if ($_SESSION['level']=='dosen'){
  $data = mysql_fetch_array(mysql_query("SELECT * FROM tbl_dosen where id_dosen='$_SESSION[id]'"));
  $pecah = explode(' ',$data[nama]);
  $nama = $pecah[0].' '.$pecah[1];
}else{
  $data = mysql_fetch_array(mysql_query("SELECT * FROM tbl_users where id_users='$_SESSION[id]'"));
  $pecah = explode(' ',$data[nama_lengkap]);
  $nama = $pecah[0].' '.$pecah[1];
}

if ($_SESSION['id']==''){
?>
              <ul class="nav navbar-nav">
                <li><a href="index.mu"><i class="glyphicon glyphicon-home"></i> Home Page</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-th-list"></i> Kategori Journal <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <?php 
                    $menu = mysql_query("SELECT * FROM tbl_kategori");
                    while ($m = mysql_fetch_array($menu)){
                        echo "<li><a href='journal-$m[id_kategori].mu'> Journal $m[nama_kategori]</a></li>";
                    }
                ?>
                  </ul>
                </li>
                <li><a href="pendaftaran.mu"><i class="glyphicon glyphicon-th"></i> Register</a></li>
                <li><a href="login.mu"><i class="glyphicon glyphicon-off"></i> Login</a></li>
              </ul>

              

              <ul class="nav navbar-nav navbar-right">
                  <form class="navbar-form navbar-left" role="search" action='index.mu' method='POST'>
                    <div class="form-group">
                      <input type="text" name='cari' class="form-control cari" placeholder="Cari Journal...">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                  </form>
              </ul>
<?php }elseif ($_SESSION['level']=='dosen'){ ?>
              <ul class="nav navbar-nav">
                <li><a href="index.mu"><i class="glyphicon glyphicon-home"></i> Home Page</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-th-list"></i> Kategori Journal <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <?php 
                    $menu = mysql_query("SELECT * FROM tbl_kategori");
                    while ($m = mysql_fetch_array($menu)){
                        echo "<li><a href='journal-$m[id_kategori].mu'> Journal $m[nama_kategori]</a></li>";
                    }
                ?>
                  </ul>
                </li>
                <li><a href='my-journal.mu'><i class="glyphicon glyphicon-file"></i> My Journal</a></li>
              </ul>

              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Welcome ! <b style='color:red'><?php echo $nama; ?></b> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href='account.mu'>Setting Account</a></li>
                        <li><a href='logout.php'>Logout</a></li>
                    </ul>
                </li>
              </ul>

<?php }elseif ($_SESSION['level']=='reviewer'){ ?>
              <ul class="nav navbar-nav">
                <li><a href="index.mu"><i class="glyphicon glyphicon-home"></i> Home Page</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-th-list"></i> Kategori Journal <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <?php 
                    $menu = mysql_query("SELECT * FROM tbl_kategori");
                    while ($m = mysql_fetch_array($menu)){
                        echo "<li><a href='journal-$m[id_kategori].mu'> Journal $m[nama_kategori]</a></li>";
                    }
                ?>
                  </ul>
                </li>
                <li><a href='list-journal.mu'><i class="glyphicon glyphicon-file"></i> List Journal</a></li>
              </ul>

              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Welcome ! <b style='color:red'><?php echo $nama; ?></b> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href='account.mu'>Setting Account</a></li>
                        <li><a href='logout.php'>Logout</a></li>
                    </ul>
                </li>
              </ul>
<?php }elseif ($_SESSION['level']=='editor'){ ?>
              <ul class="nav navbar-nav">
                <li><a href="index.mu"><i class="glyphicon glyphicon-home"></i> Home Page</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-th-list"></i> Kategori Journal <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <?php 
                    $menu = mysql_query("SELECT * FROM tbl_kategori");
                    while ($m = mysql_fetch_array($menu)){
                        echo "<li><a href='journal-$m[id_kategori].mu'> Journal $m[nama_kategori]</a></li>";
                    }
                ?>
                  </ul>
                </li>
                <li><a href='editor-list-journal.mu'><i class="glyphicon glyphicon-file"></i> List Journal</a></li>
              </ul>

              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Welcome ! <b style='color:red'><?php echo $nama; ?></b> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href='account.mu'>Setting Account</a></li>
                        <li><a href='logout.php'>Logout</a></li>
                    </ul>
                </li>
              </ul>
<?php } ?>