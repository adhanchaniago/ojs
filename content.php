<?php 
	if ($_GET['view']=='home' OR $_GET['view']==''){
		if (isset($_SESSION[admin])){ 
			include "admin/view_admin.php";
		}else{
			include "home/view_home.php";
		}
	}elseif($_GET['view']=='detail'){
		include "home/view_journal_detail.php";
	}elseif($_GET['view']=='pendaftaran'){
		include "pendaftaran.php";
	}elseif($_GET['view']=='login'){
		include "login.php";
	}elseif($_GET['view']=='kategori'){
		include "home/view_kategori.php";
	}elseif($_GET['view']=='myjournal'){
		if ($_GET[act]==''){
			include "dosen/my_journal.php";
		}elseif ($_GET[act]=='tambah'){
			include "dosen/tambah_journal.php";
		}elseif ($_GET[act]=='edit'){
			include "dosen/edit_journal.php";
		}
	}elseif($_GET['view']=='listjournal'){
		include "reviewer/list_journal.php";
	}elseif($_GET['view']=='listjournaleditor'){
		include "editor/list_journal.php";
	}elseif($_GET['view']=='account'){
		if ($_SESSION[level]=='dosen'){
			include "home/account.php";
		}else{
			include "home/account-users.php";
		}
	}elseif($_GET['view']=='kategorijournal'){
		include "admin/kategori_journal.php";
	}elseif($_GET['view']=='jabatan'){
		include "admin/jabatan.php";
	}elseif($_GET['view']=='journaladmin'){
		if ($_GET[act]==''){
			include "admin/list_journal.php";
		}elseif ($_GET[act]=='tambah'){
			include "admin/tambah_journal.php";
		}elseif ($_GET[act]=='edit'){
			include "admin/edit_journal.php";
		}
	}elseif($_GET['view']=='penulis'){
		if ($_GET[act]==''){
			include "admin/list_penulis.php";
		}elseif ($_GET[act]=='tambah'){
			include "admin/tambah_account.php";
		}elseif ($_GET[act]=='edit'){
			include "admin/edit_account.php";
		}

	}elseif($_GET['view']=='users'){
		if ($_GET[act]==''){
			include "admin/list_users.php";
		}elseif ($_GET[act]=='tambah'){
			include "admin/tambah_users.php";
		}elseif ($_GET[act]=='edit'){
			include "admin/edit_users.php";
		}
	}elseif($_GET['view']=='editprofile'){
		include "admin/edit_profile.php";
	}
?>