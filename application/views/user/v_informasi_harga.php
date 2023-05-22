

    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?=base_url();?>assets/template/images/9.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Informasi  Harga TTIC Padang</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url('c_user')?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Informasi Harga Barang <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section bg-light">
			<div class="container">
			

			<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2 style="text-align: center;">Histori perubahan Harga Barang</h2>
						<br>
						<!-- <hr> -->
						<h6>Tanggal sekarang <?= date('d-m-y')?></h6>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
						
							<!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
							</li> -->
						</ul>
						<div class="clearfix"></div>
					</div>

					<div class="x_content">

						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th style="width: 1%;">No</th>
									<th style="width: 15%;">kode barang</th>
									<th style="width: 18%;">tanggal input barang</th>
									<th>nama barang</th>
									<th style="width: 8%">satuan</th>
									<th>harga sekarang</th>
									<th>perubahan harga</th>
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
											class="btn btn-info btn-xs"><i class="fa fa-info"></i> Lihat History
											Harga</button>
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
		</section>

		
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


		
		<script>

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

		</script>
