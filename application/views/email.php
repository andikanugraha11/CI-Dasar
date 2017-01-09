<form method="POST" action="<?php echo site_url(); ?>/email">
		Nama: <br>
		<input name="nama" value="" placeholder="Nama Anda" required /><br>
		Email: <br>
		<input type="email" name="email" placeholder="xxx@gmail.com" required /><br>
		Subjek: <br>
		<input type="text" name="subjek" placeholder="Subjek" required /><br>
		Pesan: <br>
		<textarea name="pesan" required placeholder="Pesan" class="form-control"></textarea><br>
		<input type="submit" value="Kirim" />
</form>