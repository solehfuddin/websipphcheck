    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="<?= base_url('assets/admin/js/jquery-1.11.1.js') ?>"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?= base_url('assets/admin/js/bootstrap.js') ?>"></script>
	<script src="<?= base_url('assets/admin/js/datepicker.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/datatables/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/datatables/js/dataTables.bootstrap4.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/datatables/js/dataTables.responsive.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/datatables/js/responsive.bootstrap4.min.js') ?>"></script>
	
	<script src="<?= base_url('assets/vendor/datatables/js/dataTables.buttons.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/datatables/js/buttons.bootstrap4.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/datatables/js/buttons.print.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/datatables/js/buttons.html5.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/datatables/js/buttons.flash.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/datatables/js/pdfmake.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/datatables/js/vfs_fonts.js') ?>"></script>
	
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	<script type="text/javascript">
		$('[data-toggle="datepicker"]').datepicker();
	
		// Load datatable
		var table;
		$(document).ready(function() {
	 
			//datatables
			table = $('#tablehistory').DataTable({ 
	 
				"processing": true, 
				"serverSide": true, 
				"order": [], 
				 
				"ajax": {
					"url": "<?php echo site_url('showhistory')?>",
					"type": "POST",
					"data": function ( data ) {
						data.filter_datefrom = $('#filter_datefrom').val();
						data.filter_dateuntil = $('#filter_dateuntil').val();
					  }
				},
	 
				 
				"columnDefs": [
				{ 
					"targets": [ 0 ], 
					"orderable": false, 
				},
				],
	 
			});
	 
		});
		
		// Load datatable
		/*var table;
		$(document).ready(function() {
	 
			//datatables
			table = $('#tablehistoryfilter').DataTable({ 
	 
				"processing": true, 
				"serverSide": true, 
				"order": [], 
				 
				"ajax": {
					"url": "<?php echo site_url('historyfilter')?>",
					"type": "POST",
					"data": function ( data ) {
						data.filter_datefrom = $('#filter_datefrom').val();
						data.filter_dateuntil = $('#filter_dateuntil').val();
					  }
				},
	 
				 
				"columnDefs": [
				{ 
					"targets": [ 0 ], 
					"orderable": false, 
				},
				],
	 
			});
	 
		});*/

		function viewdetail($kode) {
			$.ajax({
				url: "<?php echo site_url('choosehistory')?>",
				type: "post",
				data: {
					kode: $kode,
				},
				dataType: "JSON",
				success: function(response) {
					document.getElementById("color_hex").style.backgroundColor = response.success.kode_warna;
					$('label[for="detail_hex"]').text("Hex : " + response.success.kode_warna);
					$('label[for="detail_kadar"]').text("Kadar pH : " + response.success.kode_ph);
					$('label[for="detail_kategori"]').text("Kategori pH : " + response.success.kategori_ph);
					
					$('#modalviewdetail').modal('show');
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
				}
			});
		}
		
		$('.btnfilterdata').click(function(){ //button filter event click
			table.ajax.reload();  //just reload table
		});
		
		/*$(document).ready(function() {
			$('.formFilterdata').submit(function(e) {
				e.preventDefault();

				var stdate = $('#filter_datefrom').val();
				var eddate = $('#filter_dateuntil').val();      

				$.ajax({
					type: "post",
					url: $(this).attr('action'),
					data: $(this).serialize(),
					// data: this.data,
					dataType: "json",
					beforeSend: function() {
						$('.btnfilterdata').prop('disabled', true);
						$('.btnfilterdata').html('<i class="fa fa-spin fa-spinner"></i> Processing');
					},
					complete: function() {
						$('.btnfilterdata').prop('disabled', false);
						$('.btnfilterdata').html('Filter Data');
					},
					success: function(response) {
						if (response.error){
							if (response.error.billinginv_filterstdate){
								$('#billinginv_filterstdate').addClass('is-invalid');
								$('.errorFeaturesfilterstdate').html(response.error.billinginv_filterstdate);
							}
							else
							{
								$('#billinginv_filterstdate').removeClass('is-invalid');
								$('.errorFeaturesfilterstdate').html('');
							}

							if (response.error.billinginv_filtereddate){
								$('#billinginv_filtereddate').addClass('is-invalid');
								$('.errorFeaturesfiltereddate').html(response.error.billinginv_filtereddate);
							}
							else
							{
								$('#billinginv_filtereddate').removeClass('is-invalid');
								$('.errorFeaturesfiltereddate').html('');
							}
						}
						else
						{
							$('#tablehistory').DataTable().ajax.reload();
							var element = document.getElementById("filterdate");
							var stdateParts = stdate.split("/");
							var eddateParts = eddate.split("/");
							
							var stdateFormat = stdateParts[1] + '-' + stdateParts[0] + '-' + stdateParts[2];
							var eddateFormat = eddateParts[1] + '-' + eddateParts[0] + '-' + eddateParts[2];
							element.innerHTML = "Periode " + stdateFormat + " sampai " + eddateFormat;
						}
					},
					error: function(xhr, ajaxOptions, thrownError) {
						alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
						$('#tablehistory').DataTable().ajax.reload();
					}
				});
			});
		});*/
		
		function deletedetail($kode) {
		  Swal.fire({
			  title: 'Apakah anda yakin?',
			  text: 'Data akan terhapus permanen dari sistem',
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Hapus',
			  cancelButtonText: 'Batal'
		  }).then(function(result) {
			  if (result.value)
			  {
				  $.ajax({
					  type: "post",
					  url: "<?php echo site_url('deletehistory')?>",
					  data: {
						  kode: $kode,
					  },
					  dataType: "json",
					  success: function(response) {
						  if (response.success){
							  Swal.fire(
								  'Pemberitahuan',
								  response.success.data,
								  'success',
							  ).then(function() {
								  $('#tablehistory').DataTable().ajax.reload();
							  });
						  }
					  },
					  error: function(xhr, ajaxOptions, thrownError) {
						  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
					  }
				  });
			  }
			  else if (result.dismiss == 'batal')
			  {
				  swal.dismiss();
			  }
		  });
		}
	</script>
</body>
</html>
