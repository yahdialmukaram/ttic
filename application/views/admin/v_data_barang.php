<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<!-- <h3>Users <small>Some examples to get you started</small></h3> -->
			</div>

			<!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
		</div>

		<div class="clearfix"></div>

		<!-- alert simpan data -->
		<?php if ($this->session->flashdata('success')):?>
		<div id="pesan" class="alert alert-success" role="alert">
			<strong><?=$this->session->flashdata('success');?></strong>
		</div>
		<?php endif;?>
		<!-- aler hapus data -->
		<?php if ($this->session->flashdata('error')):?>
		<div id="pesan" class="alert alert-danger" role="alert">
			<strong><?=$this->session->flashdata('error');?></strong>
		</div>
		<?php endif; ?>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Data Barang</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
										class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a>
									</li>
									<li><a href="#">Settings 2</a>
									</li>
								</ul>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<button type="button" class="btn btn-primary fa fa-plus " data-toggle="modal" data-target="#exampleModal">
						Tambah Data Barang
					</button>
					<div class="x_content">

						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th style="width: 1%;">No</th>
									<th style="width: 15%;">kode barang</th>
									<th>nama barang</th>
									<th style="width: 4%">satuan</th>
									<th style="width: 10%">opsi</th>
									</th>

								</tr>
							</thead>
							<tbody>

								<?php $no = 1; 
                  foreach ($dataBarang as $key => $value):?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$value['kode_barang'];?></td>
									<td><?=$value['nama_barang'];?></td>
									<td><?=$value['satuan'];?></td>
									<td><a href="#" onclick="deleteBarang(<?= $value['id_barang']?>);" class="btn btn-danger btn-xs"> <i
												class="fa fa-trash"> Delete</i> </a></td>
								</tr>
								<?php endforeach; ?>
								

							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
			</div>
			<div class="modal-body">

				<form action="<?=base_url();?>c_admin/addBarang" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label class="control-label col-md-12 col-sm-3 col-xs-12">kode barang</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type readonly="text" name="kode_barang" class="form-control" value="<?=$kodeBarangOtomatis; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-12 col-sm-3 col-xs-12">nama barang</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="text" name="nama_barang" class="form-control" required placeholder="masukan nama barang">
							<small>
								<font color="red">nama barang wajib isi</font>
							</small>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-12 col-sm-3 col-xs-12">satuan
						</label>
						<div class="col-md-3 col-sm-9 col-xs-12">
							<select name="satuan" id="" class="form-control">
								<option>kg</option>
							</select>
						</div>
					</div>

					<!-- <div class="form-group">
            <label class="control-label col-md-12 col-sm-3 col-xs-12">harga sebelumnya </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="number" name="harga_sebelumnya" class="form-control"required placeholder="masukan harga barang sebelumnya" >
              <small>  <font color="red">harga barang sebelumnya wajib isi</font></small>    
            </div>
          </div> -->

					<!-- <div class="form-group">
            <label class="control-label col-md-12 col-sm-3 col-xs-12">harga sekarang </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="number" name="harga_sekarang" class="form-control"required placeholder="masukan harga barang sekarang" >
              <small>  <font color="red">harga barang sekarang wajib isi</font></small>    
            </div>
          </div> -->

					<!-- <div class="form-group">
            <label class="control-label col-md-12 col-sm-3 col-xs-12">perubahan </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="number" name="perubahan" class="form-control"required>
              <small>  <font color="red">perubahan sekarang wajib isi</font></small>    
            </div>
          </div> -->

					<!-- <div class="form-group">
            <label class="control-label col-md-12 col-sm-3 col-xs-12">keterangan </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="text" name="keterangan" class="form-control"required placeholder="masukan keterangan" >
              <small>  <font color="red">perubahan sekarang wajib isi</font></small>    
            </div>
          </div> -->



			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- modal konfirmasi hapus data -->
<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form action="<?=base_url();?>c_admin/deleteBarang" method="post">
				<div class="modal-header">
					<h5 class="modal-title">Konfirmasi Hapus</h5>

				</div>
				<div class="modal-body">Yakin Akan Hapus Data harga barang ?
					<input type="hidden" name="id" id="id">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
					<button type="submit" class="btn btn-primary">Ya</button>
				</div>
			</form>
		</div>
	</div>
</div>



<script>
	function deleteBarang(id) {
		$('#id').val(id);
		$('#konfirmasi').modal('show');
	}

</script>
