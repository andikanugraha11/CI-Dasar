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
		<table  id="listDarah" class="table table-condensed table-striped table-hover table-bordered">
		<thead>
		  <tr>
		    <th>Golongan Darah</th>
		    <th>Jumlah Stok</th> 
		    <th>Lokasi</th>
		    <th>Stok</th>
		  </tr>
		  </thead>
		  <tbody>
		  <tr>
		    <td>Jill</td>
		    <td>Smith</td> 
		    <td>50</td>
		    <td>50</td>
		  </tr>
		  </tbody>

		</table>
		<script type="text/javascript">
			$('document').ready(function(){
					console.log('datatables');
			});
		</script>
	</div>
</div>

<script type="text/javascript">
	$('document').ready(function(){
		$('#labelProvinsi').hide();
		$('#provinsi').hide();

		var golongan = null, provinsi = null, halaman =1, table=null;
		$.get('<?=$url1?>', function(e){
			var banyak = Object.keys(e.data).length;
			$('#tipeDarah')
							.append('<option value="-1">- Silahkan Pilih -</option>')
							.append('<option value="0">All</option>');
			for (var i = 1; i < banyak; i++) {
				$('#tipeDarah').append('<option value="'+e.data[i]+'">'+e.data[i]+'</option>');
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
				$('#provinsi').append('<option value="'+e.data[i].kode+'">'+e.data[i].propinsi+'</option>');
			}
        });

        $('#tipeDarah').change(function(){
        	golongan = $(this).val();
        	console.log(golongan);
        	if ((golongan != null) & (provinsi != null)) {
        		if((golongan == -1) || (provinsi == -1)) return false;
        		table = $('#listDarah').DataTable({
        			"paging" 	: false,
					"ajax"		: 'http://ibacor.com/api/ayodonor?view=stok_darah&gol_darah='+golongan+'&kode_propinsi='+provinsi+'&page='+halaman,
					"columns"	:[
									{ data : 'gol_darah' },
									{ data : 'jum_stok' },
									{ data : 'lokasi' },
									null
									// { data : 'stok_id' },
									// { data : '<a class="btn btn-primary">Detail</a>' },
					],
					"columnDefs": [ {
				            "targets": -1,
				            "defaultContent": '<a class="btn btn-primary">Detail</a>'
				        } ]
				});
        	}
        	console.log('http://ibacor.com/api/ayodonor?view=stok_darah&gol_darah='+golongan+'&kode_propinsi='+provinsi+'&page='+halaman)
        });

        $('#provinsi').change(function(){
        	provinsi = $(this).val();
        	console.log(provinsi);
        	if ((golongan != null) & (provinsi != null)) {
        		if((golongan == -1) || (provinsi == -1)) return false;
        		table = $('#listDarah').DataTable({
        			"paging" 	: false,
					"ajax"		: 'http://ibacor.com/api/ayodonor?view=stok_darah&gol_darah='+golongan+'&kode_propinsi='+provinsi+'&page='+halaman,
					"columns"	:[
									{ data : 'gol_darah' },
									{ data : 'jum_stok' },
									{ data : 'lokasi' },
									null
									// { data : 'stok_id' },
									// { data : '<a class="btn btn-primary">Detail</a>' },
					],
					"columnDefs": [ {
				            "targets": -1,
				            "defaultContent": '<a class="btn btn-primary">Detail</a>'
				        } ]
				});
        	}
        	console.log('http://ibacor.com/api/ayodonor?view=stok_darah&gol_darah='+golongan+'&kode_propinsi='+provinsi+'&page='+halaman)
        });

        $('#listDarah tbody').on( 'click', 'a', function () {
		    var data = table.row($(this).parents('tr') ).data();
		    console.log(data.stok_id);
		});

	});
</script>
