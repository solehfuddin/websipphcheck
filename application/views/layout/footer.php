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
		
		var table;
		$(document).ready(function() {
			table = $('#tablehistoryfilter').DataTable({ 
	 
				"processing": true, 
				"serverSide": true, 
				"order": [], 
				 
				"ajax": {
					"url": "<?php echo site_url('showfilter')?>",
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

		$(document).ready(function() {
			$('#tablehistory').DataTable({ 
				"processing": true, 
				"serverSide": true, 
				"order": [], 
				"ajax": {
					"url": "<?php echo site_url('showhistory')?>",
					"type": "POST"
				},			 
				"columnDefs": [
				{ 
					"targets": [ 0 ], 
					"orderable": false, 
				},
				],
			});
		});
		
		$('#btn-filterdata').click(function(){
			table.ajax.reload();
		});

		function chooseSource(){
			// alert("ok");
			$('#modaltakeimg').modal('show');
		}

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

		$(document).ready(function() {
			$('.formUploadImage').submit(function(e) {
				e.preventDefault();

				let data = new FormData(this);

				$.ajax({
					type: "post",
					url: $(this).attr('action'),
					enctype: 'multipart/form-data',
					processData: false,
					contentType: false,
					cache: false,
					data: data,
					dataType: "json",
					beforeSend: function() {
						$('.btnuploadimg').prop('disabled', true);
						$('.btnuploadimg').html('<i class="fa fa-spin fa-spinner"></i> Processing');
					},
					complete: function() {
						$('.btnuploadimg').prop('disabled', false);
						$('.btnuploadimg').html('Ubah');
					},
					success: function(response) {
						if (response.error){
							Swal.fire(
								'Pemberitahuan',
								response.error.data,
								'error',
							).then(function() {
								$('#datatable-accountuser').DataTable().ajax.reload();
							});
						}
						else
						{
							$('#capture_camera').val('');
							$('#capture_galery').val('');
							$('#modaltakeimg').modal('hide');

							document.getElementById("color_hex").style.backgroundColor = response.success.kode_warna;
							$('label[for="detail_hex"]').text("Hex : " + response.success.kode_warna);
							$('label[for="detail_kadar"]').text("Kadar pH : " + response.success.kode_ph);
							$('label[for="detail_kategori"]').text("Kategori pH : " + response.success.kategori_ph);
							
							$('#modalviewdetail').modal('show');
						}
					},
					error: function(xhr, ajaxOptions, thrownError) {
						alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
					}
				});

				return false;
			});
		});
		
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
								  $('#tablehistoryfilter').DataTable().ajax.reload();
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
