<!DOCTYPE html>
<html>
<head>
	<title>Andika Nugraha</title>
</head>
<body>
<h1>Coba deh</h1>
	<table border="1">
		<tr>
			<th>no</th>
			<th>nama</th>
			<th>email</th>
			<th>gender</th>
			<th>skill</th>	
		</tr>
		<?php 
		echo $uriseg;
		$no = $this->uri->segment('3') + 1;
		foreach($user as $u){ 
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $u->first_name." ".$u->last_name?></td>
			<td><?php echo $u->email ?></td>
			<td><?php echo $u->gender ?></td>
			<td><?php echo $u->Skill ?></td>
		</tr>
	<?php } ?>
	</table>
	<br/>
	<?php 
	echo $this->pagination->create_links();
	?>
</body>
</html>