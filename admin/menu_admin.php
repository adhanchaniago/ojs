			<ul class="nav navbar-nav">
                <li><a href="index.mu"><i class="glyphicon glyphicon-home"></i> Home Page</a></li>
                <li><a href="index.php?view=kategorijournal"><i class="glyphicon glyphicon-th-list"></i> Kategori Journal</a></li>
                <li><a href="index.php?view=journaladmin"><i class="glyphicon glyphicon-book"></i> List Journal</a></li>
                <li><a href="index.php?view=jabatan"><i class="glyphicon glyphicon-list"></i> List Jabatan</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> List Users <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="index.php?view=penulis">Data Penulis</a></li>
                    <li><a href="index.php?view=users&status=editor">Data Editor</a></li>
                    <li><a href="index.php?view=users&status=reviewer">Data Reviewer</a></li>
                  </ul>
                </li>
            </ul>

			<ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo "Login as! <strong class='text-default'>".$_SESSION[admin]; ?></strong> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="index.php?view=editprofile">Setting Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </li>
            </ul>