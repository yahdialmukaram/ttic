<style>
	.text-error {
		color: red;
	}

</style>
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
		<?php if ($this->session->flashdata('success')): ?>
		<div id="pesan" class="alert alert-success" role="alert">
			<strong><?=$this->session->flashdata('success');?></strong>
		</div>
		<?php endif;?>
		<!-- aler hapus data -->
		<?php if ($this->session->flashdata('error')): ?>
		<div id="pesan" class="alert alert-danger" role="alert">
			<strong><?=$this->session->flashdata('error');?></strong>
		</div>
		<?php endif;?>

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

					<div class="x_content">

						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th style="width: 1%;">No</th>
									<th>kode barang</th>
									<th>tanggal input barang</th>
									<th>nama barang</th>
									<th style="width: 8%">satuan</th>
									<th>harga sekarang</th>
									<th>perubahan harga</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($dataHarga as $key => $value): ?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$value['kode_barang'];?></td>
									<td><?=$value['tgl_input'];?></td>
									<td><?=$value['nama_barang'];?></td>
									<td><?=$value['satuan'];?></td>
									<td><?="Rp. " . number_format($value['harga']);?></td>
									<td>
										<button onclick="showModalHistory(<?=$value['id_barang']?>)" type="button"
											class="btn btn-info btn-xs"><i class="fa fa-info"></i> History
											Harga</button>
									</td>
									<td>
										<!-- <a href="<?=base_url();?>" class="btn btn-success btn-xs"><i
												class="fa fa-edit edit-harga"
												data-id="<?=$value['id_harga']?>">ditails harga</i></a> -->
										<button onclick="perbaruiHarga(<?=$value['id_barang']?>)" type="button"
											class="btn btn-success btn-xs"><i class="fa fa-money"></i> Perbarui
											Harga</button>
										<!-- <a href="#" onclick="deleteKelolaHarga(<?=$value['id_histori']?>);"
											class="btn btn-danger btn-xs"> <i class="fa fa-trash">
												Delete</i> </a> -->
									</td>
								</tr>
								<?php endforeach;?>

							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>



<!-- modal konfirmasi hapus data -->
<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form action="<?=base_url();?>c_admin/deleteKelolaHarga" method="post">
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

<!-- Modal edit harga -->
<div class="modal fade" id="edit-harga" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 style="text-align: center;" class="modal-title"> <i class="fa fa-refresh"> Ditails Harga</i>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url();?>c_admin/updateHarga" method="post" enctype="multipart/form-data">
					<input type="text" hidden class="form-control" name="id" id="id">

					<div class="form-group">
						<label for="">nama barang</label>
						<input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder=""
							aria-describedby="helpId">
					</div>
					<div class="form-group">
						<label for="">satuan</label>
						<input type="text" name="satuan" id="satuan" class="form-control" placeholder=""
							aria-describedby="helpId">
					</div>
					<div class="form-group">
						<label for="">harga sekarang</label>
						<input type="number" name="harga" id="harga" class="form-control" placeholder=""
							aria-describedby="helpId">
					</div>

					<!-- <div class="form-group">
						<label for="">Edit Password</label>
						<input type="password" name="password" id="password_u" class="form-control" placeholder="*******"
							aria-describedby="helpId">
					</div> -->

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary btn-sm fa fa-save"> Save</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-history-harga" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">History Harga</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- history harga -->
				<div class="x_content">
					<ul class="list-unstyled timeline history-harga">
						<li>
							<div class="block">
								<div class="tags">
									<a href="" class="tag">
										<span>Entertainment</span>
									</a>
								</div>
								<!-- <div class="block_content">
									<h2 class="title">
										<a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
									</h2>
									<div class="byline">
										<span>13 hours ago</span> by <a>Jane Smith</a>
									</div>
									<p class="excerpt">Film festivals used to be do-or-die moments for movie
										makers. They were where you met the producers that could fund your
										project, and if the buyers liked your flick, they’d pay to Fast-forward
										and… <a>Read&nbsp;More</a>
									</p>
								</div> -->
							</div>
						</li>
						<li>
							<!-- <div class="block">
								<div class="tags">
									<a href="" class="tag">
										<span>Entertainment</span>
									</a>
								</div>
								<div class="block_content">
									<h2 class="title">
										<a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
									</h2>
									<div class="byline">
										<span>13 hours ago</span> by <a>Jane Smith</a>
									</div>
									<p class="excerpt">Film festivals used to be do-or-die moments for movie
										makers. They were where you met the producers that could fund your
										project, and if the buyers liked your flick, they’d pay to Fast-forward
										and… <a>Read&nbsp;More</a>
									</p>
								</div>
							</div> -->
						</li>
						<li>
							<!-- <div class="block">
								<div class="tags">
									<a href="" class="tag">
										<span>Entertainment</span>
									</a>
								</div>
								<div class="block_content">
									<h2 class="title">
										<a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
									</h2>
									<div class="byline">
										<span>13 hours ago</span> by <a>Jane Smith</a>
									</div>
									<p class="excerpt">Film festivals used to be do-or-die moments for movie
										makers. They were where you met the producers that could fund your
										project, and if the buyers liked your flick, they’d pay to Fast-forward
										and… <a>Read&nbsp;More</a>
									</p>
								</div>
							</div> -->
						</li>
					</ul>

				</div>
				<!-- end history harga -->
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-perbarui-harga" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Perbarui Harga</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="">Harga Baru (update harga)</label>
					<input type="text" name="" id="harga_sekarang" class="form-control" placeholder=""
						aria-describedby="helpId">
					<small id="helpId" class="text-error eharga-sekarang"></small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="prosesPerbaruiHarga()"> <i class="fa fa-refresh"> Update Harga </i></button>
			</div>
		</div>
	</div>
</div>

<script>
	$('.edit-harga').on('click', function (e) {

		e.preventDefault();

		$('#edit-harga').modal();
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
				$('#nama_barang').val(response.nama_barang);
				$('#harga').val(response.harga);
				$('#satuan').val(response.satuan);
				$('#edit-harga').modal('show');
			}
		});

	})

	function deleteKelolaHarga(id) {
		$("#id").val(id);
		$("#konfirmasi").modal("show");
	}

	function showModalHistory(id) {
		$.ajax({
			type: "POST",
			url: "<?=base_url('C_admin/getHistoryHarga')?>",
			data: {
				id_barang: id
			},
			dataType: "JSON",
			success: function (response) {
				let html = "";
				if (response.status == 'success') {
					$.each(response.data, function (indexInArray, valueOfElement) {
						html += `<li>
									<div class="block">
										<div class="tags">
											<a href="" class="tag">
												<span>${valueOfElement.created_at}</span>
											</a>
										</div>
										<div class="block_content">
											<h2 class="title">
												<a>Rp. ${valueOfElement.harga_terakhir}</a>
											</h2>
											<div class="byline">


										</div>
									</div>
								</li>`;
					});
				}
				$(".history-harga").html(html);
				$("#modal-history-harga").modal("show");
			},
			error: function () {
				swal({
					title: "Gagal",
					text: "Gagal mengambil data",
					icon: "error",
					button: "Ok",
				});
			}
		});
	}

	function perbaruiHarga(id) {
		localStorage.setItem('id', id);
		$("#modal-perbarui-harga").modal("show");
	}

	function prosesPerbaruiHarga() {
		$.ajax({
			type: "POST",
			url: "<?=base_url('C_admin/updateHargaBarang')?>",
			data: {
				id_barang: localStorage.getItem('id'),
				harga: $('#harga_sekarang').val()
			},
			dataType: "JSON",
			success: function (response) {
				if (response.status == 'validation_failed') {
					$(".eharga-sekarang").text(response.errors.harga); //unutk tex error
				} else {
					$("#modal-perbarui-harga").modal("hide");
					swal({
						title: "Berhasil!",
						text: "Harga barang berhasil diperbarui",
						icon: "success",
						button: "OK",
					}).then(function () {
						location.reload(); //untuk perbarui data di table
					});
				}

			},
			error: function () {
				swal({
					title: "Gagal!",
					text: "Data Gagal Diperbarui",
					icon: "error",
					button: "Ok",
				});
			}
		});
	}

</script>
