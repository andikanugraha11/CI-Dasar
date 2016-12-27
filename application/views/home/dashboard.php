<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Selamat datang</h1>
	<h3>ID : <?php echo $this->session->userdata('userId')?></h3>
	<a href="<?php echo base_url('home/logout')?>">Logout</a>
</body>
</html>