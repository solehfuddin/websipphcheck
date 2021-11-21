   <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            
        </div>
    </div>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
				<!-- <input type="file" name="image" accept="image/*" capture="user">
				
				<input type="file" name="article_imgubah" class="form-control" id="article_imgubah" 
                    accept=".jpg, .jpeg, .png" /> -->
                <div class="col-md-12">
                    <h4 class="page-head-line-purple text-center">Aplikasi Ph Checker</h4>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-teal text-center">
                    Mengecek kadar air kolam renang sangatlah penting untuk menjaga kualitas air kolam agar selalu stabil. Kualitas air yang stabil yaitu jika air memiliki kadah pH yang ideal. Selain itu, kolam juga harus selalu bersih dan juga jernih. <br> Ayo cek pH air dengan CEK PH!
                    </div>
                </div>

            </div>
            <div class="row">
                 <a href="#" onclick="chooseSource()") class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-five">
                         <i class="fa fa-camera-retro dashboard-div-icon" ></i>
                        
                         <h5>Cek Ph Air </h5>
                    </div>
                </a>

				 <a href="<?= site_url('historyfilter') ?>" class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-five">
                         <i class="fa fa-list-alt dashboard-div-icon" ></i>
                       
                         <h5>Hasil Cek Ph </h5>
                    </div>
                 </a>
            </div>
                
            <div class="row">
                <div class="col-md-12">
                    <a href="<?= site_url('logoutuser') ?>" class="btn btn-purple"> Logout</a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modaltakeimg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Pilih Gambar</h4>
            </div>
            
            <?= form_open_multipart('uploadimg', ['class' => 'formUploadImage']); ?>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="nama-infocategory-input" class="form-control-label">Pilih Foto</label>
                        <input type="file" name="capture_camera" id="capture_camera" class="form-control" accept="image/*" 
                            capture="user">
                    </div>

                    <div class="form-group">
                        <label for="nama-infocategory-input" class="form-control-label">Atau Pilih Galeri</label>
                        <input type="file" name="capture_galery" class="form-control" id="capture_galery" 
                        accept=".jpg, .jpeg, .png" />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-purple btnuploadimg">Upload</button>
            </div>
            
            <?= form_close(); ?>
            </div>
        </div>
    </div>

    <!-- Modal View Detail -->
    <div class="modal fade" id="modalviewdetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Hasil Pengujian</h4>
            </div>
            
            <div class="modal-body">
                    <div class="form-group text-center">
                    <div id="color_hex" class="alert" role="alert"></div>
                    </div>
                    
                    <div class="form-group">
                    <label for="detail_hex" name="detail_hex" class="form-control-label">Hex : </label>
                    </div>

                    <div class="form-group">
                    <label for="detail_kadar" name="detail_kadar" class="form-control-label">Kadar pH :</label>
                    </div>
                    
                    <div class="form-group">
                    <label for="detail_kategori" name="detail_kategori" class="form-control-label">Kategori pH :</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-purple" data-dismiss="modal">OK</button>
            </div>
            
            </div>
        </div>
    </div>