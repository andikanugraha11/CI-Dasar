<div class="jumbotron">

	<?php 
		$attributes = array('id' => 'login', 'method' => 'post');
		echo form_open('home/index',$attributes);
	?>

	<div class="form-group">
		<?php
			$data = array(
		        'type'  => 'text',
		        'name'  => 'username',
		        'class' => 'form-control',
		        'placeholder' => 'username'
			);
			echo form_input($data);
		?>
	</div>


	<div class="form-group">
		<?php
			$data = array(
		        'type'  => 'password',
		        'name'  => 'password',
		        'class' => 'form-control',
		        'placeholder' => 'Password'
			);
			echo form_input($data);
		?>
	</div>

	<?php
		$data = array(
		        'type'  => 'submit',
		        'name'  => 'submit',
		        'class' => 'btn btn-primary',
		        'value' => 'LOGIN'
			);
		echo form_submit($data);
		echo form_close();
	?>

	<!-- <form method="get" action="#">
		<div class="form-group">
			<label>Usrname</label>
			<input class="form-control" type="text" name="username">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input class="form-control" type="password" name="password">
		</div>
		<input class="btn btn-success btn-lg" type="submit" name="" value="Masuk">
	</form>	 -->
	<div><?php echo validation_errors(); ?></div>
	<div class="text-danger"><?php echo $this->session->flashdata('noLogin'); ?></div>
	<div class="text-danger"><?php echo $this->session->flashdata('salah'); ?></div>
</div>

<script type="text/javascript">
	$('#login').submit(function(e){
		e.preventDefault();
		var url = $(this).attr('action');
		var postData = $(this).serialize();
		$.post(url,postData,function(object){
				if(object.objectlogin_dika ==1){
					window.location.href='<?=base_url('home/admin')?>';
				}else{
					swal({
						title : "Gagal Masuk",
						text : "username atau password salah",
						type : "error",
						confirmButtonColor: "#DD6B55"
					});
				}
			},'json');
	});
</script>