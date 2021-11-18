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
					<button type="button" class="btn btn-purple" onclick="filterData()">
						<i class="fa fa-calendar-o" ></i>
					</button>
				</div>
           </div>
		   <div class="table-responsive">
				<table id="tablehistoryfilter" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center col-md-1 col-xs-1">No.</th>
							<th class="text-center col-md-2 col-xs-2">Nama</th>
							<th class="text-center col-md-1 col-xs-3">Tgl Pengujian</th>
							<th class="text-center col-md-1 col-xs-2">Kadar Ph</th>
							<th class="text-center col-md-1 col-xs-3">Aksi</th>
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

<!-- Modal Filter Data -->
 <div class="modal fade" id="modalfilterdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="text-center">Filter Data Pengujian</h4>
        </div>
        
		<?= form_open('historyfilter', ['class' => 'formFilterData']); ?>
        <div class="modal-body">
                <div class="form-group">
                  <label for="nama-infocategory-input" class="form-control-label">Tanggal Awal</label>
                  <input data-toggle="datepicker" class="form-control" type="text" placeholder="Pilih Tanggal" 
                        name="filter_datefrom" id="filter_datefrom" />
                </div>
				
				<div class="form-group">
                  <label for="nama-infocategory-input" class="form-control-label">Sampai Tanggal</label>
                  <input data-toggle="datepicker" class="form-control datepicker" type="text" placeholder="Pilih Tanggal" 
                        name="filter_dateuntil" id="filter_dateuntil" />
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-purple btnfilterdata">Filter</button>
        </div>
		
		<?= form_close(); ?>
        </div>
    </div>
</div>