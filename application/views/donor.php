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
				            "defaultContent": '<a type="button" data-toggle="modal" data-target=".detailStok" class="btn btn-primary">Detail</a>'
				        } ]
				});
        	}
        	console.log('http://ibacor.com/api/ayodonor?view=stok_darah&gol_darah='+golongan+'&kode_propinsi='+provinsi+'&page='+halaman)
        });

        $('#listDarah tbody').on( 'click', 'a', function () {
		    var data = table.row($(this).parents('tr') ).data();
		    $('#detailDari').text(data.lokasi);
		    console.log(data.stok_id);
		    $('#detailDarah').DataTable({
        			// "paging" 	: false,
					"ajax"		: 'http://ibacor.com/api/ayodonor?view=detail_stok&stok_id='+data.stok_id,
					"columns"	:[
									{ data : 'produk' },
									{ data : 'komponen' },
									{ data : 'stok_darah.a_positif' },
									{ data : 'stok_darah.a_negatif' },
									{ data : 'stok_darah.b_positif' },
									{ data : 'stok_darah.b_negatif' },
									{ data : 'stok_darah.ab_positif' },
									{ data : 'stok_darah.ab_negatif' },
									{ data : 'stok_darah.o_positif' },
									{ data : 'stok_darah.o_negatif' },
								],
				});
		});

	});
</script>

<!-- Modal -->
<div class="modal fade detailStok" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h3 class="text-center" id="detailDari"></h3>
			</div>
			<div class="modal-body">
					<table  id="detailDarah" class="table table-condensed table-striped table-hover table-bordered">
					<thead>
					  <tr>
					    <th>Produk</th>
					    <th>Komponen</th> 
					    <th>A Positif</th>
					    <th>A Negatif</th>
					    <th>B Positif</th>
					    <th>B Negatif</th>
					    <th>AB Positif</th>
					    <th>AB Negatif</th>
					    <th>O Positif</th>
					    <th>O Negatif</th>
					  </tr>
					  </thead>
					  <tbody>
					  <tr>
					    <td>Jill</td>
					    <td>Smith</td> 
					    <td>50</td>
					    <td>50</td>
					    <td>Jill</td>
					    <td>Smith</td> 
					    <td>50</td>
					    <td>50</td>
					    <td>50</td>
					    <td>50</td>
					  </tr>
					  </tbody>

					</table>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
		</div>
    </div>
  </div>
</div>