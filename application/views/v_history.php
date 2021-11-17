   <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            
        </div>
    </div>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">          
           <div class="row">
                <div class="col-md-11 col-sm-11 col-xs-10">
                    <h4 class="page-head-line-purple text-center">List Pengujian</h4>
                </div>
				<div class="col-md-1 col-sm-1 col-xs-2">
					<a href="<?= site_url('logoutuser') ?>" class="btn btn-purple">
						<i class="fa fa-calendar-o" ></i>
					</a>
				</div>
           </div>
		   <div class="table-responsive">
				<table id="tablehistory" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center col-md-1">No.</th>
							<th class="text-center col-md-2">Nama</th>
							<th class="text-center col-md-1">Tgl Pengujian</th>
							<th class="text-center col-md-1">Kadar Ph</th>
							<th class="text-center col-md-1">Aksi</th>
						</tr>
					</thead>
					<tbody class="text-center">
									  
					</tbody>
				</table>
			</div>
			
			<br />
			<br />
			<div class="row">
				<div class="col-md-12">
					<a href="<?= site_url('logoutuser') ?>" class="btn btn-purple"> Logout</a>
				</div>
			</div>
        </div>
    </div>

 <!-- Modal Tambah Info -->
 <div class="modal fade" id="modalviewdetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- Handle Form -->
        <?= form_open_multipart('article/simpandata', ['class' => 'formModaltambaharticle']); ?>

        <div class="modal-body">
                <div class="form-group">
                  <label for="kode-infonews-input" class="form-control-label">Kode Artikel</label>
                  <input class="form-control" type="text"  placeholder="ARTC001" readonly
                        name="article_kode" id="article_kode" />
                  <!-- Error Validation -->
                  <div class="invalid-feedback errorArticleKode">test</div>
                </div>
				
				<div class="form-group">
                  <label for="kode-infocategory-input" class="form-control-label">Jenis Artikel</label>
                  <select class="form-control" id="article_type" name="article_type">
                    <?php foreach($arttype as $item): ?>
                    <option value="<?= $item['kode_type']; ?>">
                        <?= $item['type']; ?>
                    </option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="nama-infocategory-input" class="form-control-label">Judul Artikel</label>
                  <input class="form-control" type="text" placeholder="Office space for banking" 
                        name="article_title" id="article_title" />
                  <!-- Error Validation -->
                  <div class="invalid-feedback errorArticleTitle">testte</div>
                </div>
				
				<div class="form-group">
                  <label for="nama-infocategory-input" class="form-control-label">Slug</label>
                  <input class="form-control" type="text" placeholder="Office-space-for-banking" 
                        name="article_slug" id="article_slug" />
                  <!-- Error Validation -->
                  <div class="invalid-feedback errorArticleSlug">testte</div>
                </div>
				
				<div class="form-group">
                  <label for="nama-infocategory-input" class="form-control-label">Deskripsi Singkat</label>
                  <!-- <div id="infonews_summernote"></div> -->
                  <div class="invalid-feedback bg-secondary errorArticleDesc">testte</div>
                  <textarea id="article_desc" name="article_desc" class="form-control" rows="2" required></textarea>
                </div>
				
				<div class="form-group">
                  <label for="nama-infocategory-input" class="form-control-label">Dekripsi Lengkap</label>
                  <!-- <div id="infonews_summernote"></div> -->
                  <div class="invalid-feedback bg-secondary errorArticleDescfull">testte</div>
                  <textarea id="article_descfull" name="article_descfull" class="form-control" rows="2" required></textarea>
                </div>
				
				<div class="form-group" id="control-imgubah">
                  <label for="nama-infocategory-input" class="form-control-label">Gambar</label>
                  <input type="file" name="article_img" class="form-control" id="article_img" 
                    accept=".jpg, .jpeg, .png" /></p>
                  <div class="invalid-feedback errorArticleImg">testte</div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary btnmodaltambaharticle">Simpan</button>
        </div>

        <?= form_close(); ?>
        <!-- Handle FORM -->
        </div>
    </div>
</div>