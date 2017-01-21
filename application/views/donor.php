<div class="container">
	<div class="col-md-3">
		<div class="form-group">
		  <label>Tipe Darah:</label>
		  <select class="form-control" id="tipeDarah">
		  </select>
		</div>
		<div class="form-group">
			<label id="labelProvinsi">Provinsi:</label>
		  		<select class="form-control" id="provinsi">
		  	</select>
		</div>
	</div>
	<div class="col-md-3 well">
		<div id="lisDarah"></div>
	</div>
</div>

<script type="text/javascript">
	$('document').ready(function(){
		$('#labelProvinsi').hide();
		$('#provinsi').hide();
		$.get('<?=$url1?>', function(e){
			var banyak = Object.keys(e.data).length;
			$('#tipeDarah')
							.append('<option value="-1">- Silahkan Pilih -</option>')
							.append('<option value="0">All</option>');
			for (var i = 1; i < banyak; i++) {
				$('#tipeDarah').append('<option value=" '+ e.data[i] + '">' + e.data[i] + '</option>');
			}
        });

        $('#tipeDarah').change(function(){
        	$('#labelProvinsi').show();
        	$('#provinsi').show();
        });

        $.get('<?=$url2?>', function(e){
        	var banyak = Object.keys(e.data).length;
        	$('#provinsi')
							.append('<option value="-1">- Silahkan Pilih -</option>')
			for (var i = 0; i < banyak; i++) {
				$('#provinsi').append('<option value=" '+ e.data[i].kode + '">' + e.data[i].propinsi + '</option>');
			}
        });
	});
</script>