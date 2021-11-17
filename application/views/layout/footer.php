    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="<?= base_url('assets/admin/js/jquery-1.11.1.js') ?>"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?= base_url('assets/admin/js/bootstrap.js') ?>"></script>
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
	
	<script type="text/javascript">
		var table;
		$(document).ready(function() {
	 
			//datatables
			table = $('#tablehistory').DataTable({ 
	 
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

		//Fungsi select data artikel
		function viewdetail($kode) {
			$('#modalviewdetail').modal('show');
			
			/*var url = "/article/pilihdata";
			$.ajax({
				url: BASE_URL + url,
				type: "post",
				data: {
					kode: $kode,
				},
				dataType: "JSON",
				success: function(response) {
					$('#article_kodeubah').val(response.success.kode);
					$('#article_typeubah').val(response.success.type);
					$('#article_titleubah').val(response.success.judul);
					$('#article_slugubah').val(response.success.slug);
					$('#article_descubah').val(response.success.deskripsishort);
					$('#article_recentimg').attr("src", response.success.image);
					CKEDITOR.instances.article_descfullubah.setData(response.success.deskripsifull);
					
					if (response.success.img === "" || response.success.img === null)
					{
						$('#control-article-imgubah').attr("style","display: none");
						$('#control-article-recentimg').attr("style","display: none");
					}
					else
					{
						$('#control-article-imgubah').attr("style","");
						$('#control-article-recentimg').attr("style","");
					}

					$('#article_kodeubah').removeClass('is-invalid');
					$('.errorArticleKodeubah').html('');
					
					$('#article_titleubah').removeClass('is-invalid');
					$('.errorArticleTitleubah').html('');
					
					$('#article_slugubah').removeClass('is-invalid');
					$('.errorArticleSlugubah').html('');
					
					$('#article_descubah').removeClass('is-invalid');
					$('.errorArticleDescubah').html('');
					
					$('#article_descfullubah').removeClass('is-invalid');
					$('.errorArticleDescfullubah').html('');

					$('#modalubaharticle').modal('show');
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
				}
			});*/
		}
	</script>
</body>
</html>
