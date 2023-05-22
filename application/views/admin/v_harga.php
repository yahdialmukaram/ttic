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
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
									aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
					<button type="button" class="btn btn-primary fa fa-plus " data-toggle="modal"
						data-target="#exampleModal">
						Kelola Harga Barang
					</button>

					<a href="<?=base_url();?>c_cetak/printDataHargaBarang" class="btn btn-success fa fa-print"
						target="_blank"> Cetak Semua Harga Barang</a>

						<!-- form cetak perbulan -->
					<form action="<?=base_url()?>c_cetak/cetakPerbulan" method="POST">

						<div class="col-sm-4">
						</div>
						<div class="col-sm-2">
							<select name="bulan" class="form-control" id="">
								<option value="1">januari</option>
								<option value="2">februari</option>
								<option value="3">maret</option>
								<option value="4">april</option>
								<option value="5">mei</option>
								<option value="6">juni</option>
								<option value="7">juli</option>
								<option value="8">agustus</option>
								<option value="9">september</option>
								<option value="10">oktober</option>
								<option value="11">november</option>
								<option value="12">desember</option>
							</select>

						</div>

						<div class="col-sm-2">
							<select name="tahun" class="form-control" id="">
								<?php 
						$mulai = date('Y') - 1;
						for ($i = $mulai; $i < $mulai  +7 ; $i++) { 
							echo '<option value="'. $i .'">' . $i . '</option>';
						}
						?>
							</select>
						</div>
						<button type="submit" class="btn btn-success"><i class="fa fa-print"> cetak
								perbulan</i></button>
					</form>


					<!-- laporan pertahun -->
					<form action="<?=base_url()?>c_cetak/cetakPertahun" method="POST">
						<div class="col-sm-4">
						</div>
						<div class="col-sm-2">
						</div>

						<div class="col-sm-2">
							<select name="tahun" class="form-control" id="">
								<?php 
						$mulai = date('Y') - 1;
						for ($i = $mulai; $i < $mulai  +7 ; $i++) { 
							echo '<option value="'. $i .'">' . $i . '</option>';
						}
						?>
							</select>
						</div>
						<button type="submit" class="btn btn-success"><i class="fa fa-print"> cetak
								pertahun</i></button>
					</form>

					<div class="x_content">

						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th style="width: 1%;">No</th>
									<th style="width: 15%;">kode barang</th>
									<th>tanggal input</th>
									<th>nama barang</th>
									<th style="width: 4%">satuan</th>
									<th>harga</th>
									<?php if($this->session->userdata('level')=='admin'){ ?>
									<th style="width: 20%">Opsi</th>
									<?php }; ?>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; 
                        foreach ($dataHarga as $key => $value):?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$value['kode_barang'];?></td>
									<td><?=$value['tgl_input'];?></td>
									<td><?=$value['nama_barang'];?></td>
									<td style="text-align: center;"><?=$value['satuan'];?></td>
									<td><?="Rp. ".number_format($value['harga']);?></td>


									<?php if($this->session->userdata('level')=='admin'){ ?>
									<td>
										<a href="<?=base_url();?>" class="btn btn-primary btn-sm fa fa-edit edit"
											data-id="<?=$value['id_harga']?>"> Edit Harga Barang</a>
										<a href="#" onclick="deleteHarga(<?=$value['id_harga']?>);"
											class="btn btn-danger btn-xs"> <i class="fa fa-trash">
												Delete</i> </a>
									</td>
									<?php }; ?>

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
				<h5 class="modal-title" id="exampleModalLabel">Kelola Harga Barang</h5>
			</div>
			<div class="modal-body">

				<form action="<?=base_url();?>c_admin/addHarga" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label class="control-label col-md-12 col-sm-3 col-xs-12">nama barang</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<select name="id_barang" id="" class="form-control">
								<option value="">--pilih nama barang--</option>
								<?php foreach ($dataBarang as $key => $value) :?>
								<option value="<?=$value['id_barang']?>"><?=$value['nama_barang']?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-12 col-sm-3 col-xs-12">satuan
						</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<select name="satuan" id="" class="form-control">
								<option value="">--pilih satuan barang--</option>
								<?php foreach ($dataBarang as $key => $value) :?>
								<option value="<?=$value['id_barang']?>"><?=$value['satuan']?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-12 col-sm-3 col-xs-12">harga </label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="number" name="harga" class="form-control" required
								placeholder="masukan harga barang ">
							<small>
								<font color="red">harga barang wajib isi</font>
							</small>
						</div>
					</div>


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
			<form action="<?=base_url();?>c_admin/deleteHarga" method="post">
				<div class="modal-header">
					<h5 class="modal-title">Konfirmasi Hapus</h5>

				</div>
				<div class="modal-body">Yakin Akan Hapus Data Harga Barang ?
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


<!-- Modal edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 style="text-align: center;" class="modal-title">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url();?>c_admin/updateHarga" method="post" enctype="multipart/form-data">
					<input type="text" hidden name="id" id="id_u">

					<div class="form-group">
						<label for="">nama barang</label>
						<input type readonly="text" name="nama_barang" id="nama_barang_u" class="form-control"
							placeholder="" aria-describedby="helpId">
					</div>

					<div class="form-group">
						<label for="">Harga</label>
						<input type="number" name="harga" id="harga_u" class="form-control" placeholder=""
							aria-describedby="helpId">
					</div>
					<!-- <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="nama_u" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
 -->

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary btn-sm fa fa-save"> Update</button>
			</div>
			</form>
		</div>
	</div>
</div>


<script>
	$('.edit').on('click', function (e) {

		e.preventDefault();

		$('#edit').modal();
		let id = $(this).data('id')
		$.ajax({
			type: "POST",
			url: "<?=base_url('c_admin/getDataHarga')?>",
			data: {
				id: id
			},
			dataType: "JSON",
			success: function (response) {
				console.log(response);
				$('#id').attr('hidden', true);
				$('input[name=id]').val(response.id_harga);
				$('#nama_barang_u').val(response.nama_barang);
				$('#harga_u').val(response.harga);
				$('#edit').modal('show');
			}
		});

	})

</script>

<script>
	function deleteHarga(id) {
		$("#id").val(id);
		$("#konfirmasi").modal("show");
	}

</script>

<!-- <script>
	$(document).ready(function(){
		$('#format_laporan').submit(function(e){
			e.preventDefault();
			var id = $('#angkatan').val();
			// console.log(id);
			var url = '<?= base_url('c_cetak/filter/')?>' + id;
			$('#datatable').load(url);
		})
	})

</script> -->
