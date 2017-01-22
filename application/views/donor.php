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
	<div class="col-md-9 well">
		<table style="width:100%" id="listDarah" class="table table-condensed table-striped table-hover">
		<thead>
		  <tr>
		    <th>Golongan Darah</th>
		    <th>Jumlah Stok</th> 
		    <th>Lokasi</th>
		  </tr>
		  </thead>
		  <tbody>
		  <tr>
		    <td>Jill</td>
		    <td>Smith</td> 
		    <td>50</td>
		  </tr>
		  <tr>
		    <td>Eve</td>
		    <td>Jackson</td> 
		    <td>94</td>
		  </tr>
		  </tbody>

		</table>
		<script type="text/javascript">
			$('document').ready(function(){
					console.log('datatables');
				$('#listDarah').DataTable({
					"paging" 	: false,
					"data"		: 'http://ibacor.com/api/ayodonor?view=stok_darah&gol_darah=0&kode_propinsi=0&page=1',
					"columns"	: [
										{data : 'lokasi'},
										{data : 'lokasi'},
										{data : 'lokasi'}
								]
				});
			});
		</script>
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
