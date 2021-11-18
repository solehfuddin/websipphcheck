   <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            
        </div>
    </div>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">          
           <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h4 class="page-head-line-purple text-center">List Pengujian</h4>
                </div>
		   </div>
		   
		   <div class="row">
					<?= form_open('historyfilter', ['class' => 'formFilterdata']); ?>
					<div class="col-md-5 col-xs-12">
					  <div class="form-group">
						<label class="form-control-label">Start date</label>
						<input data-toggle="datepicker" class="form-control" type="text" placeholder="Pilih Tanggal" 
							name="filter_datefrom" id="filter_datefrom" />
					  </div>
					</div>
					<div class="col-md-5 col-xs-12">
					  <div class="form-group">
						<label class="form-control-label">End date</label>
						<input data-toggle="datepicker" class="form-control datepicker" type="text" placeholder="Pilih Tanggal" 
							name="filter_dateuntil" id="filter_dateuntil" />
					  </div>
					</div>
					<div class="col-md-1 col-xs-12">
						<br/>
						<button type="submit" class="btn btn-primary btn-sm mt-3 btnfilterdata" style="margin-top: 7px;">
						  Filter Data
						</button>
					</div>
					<?= form_close(); ?>
			</div>
		   <br/>
		  
		   <div class="table-responsive">
				<table id="tablehistory" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<!-- <th class="text-center col-md-1 col-sm-1 col-xs-1">No.</th> -->
							<th class="text-center col-md-2 col-sm-2 col-xs-2">Nama</th>
							<th class="text-center col-md-1 col-sm-3 col-xs-3">Tgl Pengujian</th>
							<th class="text-center col-md-1 col-sm-1 col-xs-1">Kadar Ph</th>
							<th class="text-center col-md-1 col-sm-4 col-xs-4">Aksi</th>
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

 <!-- Modal View Detail -->
 <div class="modal fade" id="modalviewdetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="text-center">Detail Pengujian</h4>
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