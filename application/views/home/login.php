<div class="jumbotron">

	<?php 
		$attributes = array('id' => 'myform', 'method' => 'post');
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