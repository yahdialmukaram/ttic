
	<?php if ($this->session->flashdata('success')):?>
					<div id="pesan" class="alert alert-success" role="alert">
						<strong><?=$this->session->flashdata('success');
						?></strong>
					</div>
					<?php endif;?>
					<!-- aler hapus data -->
					<?php if ($this->session->flashdata('error')):?>
					<div id="pesan" class="alert alert-danger" role="alert">
						<strong><?=$this->session->flashdata('error');
						?></strong>
					</div>
          <?php endif; ?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url(assets/template/images/dinas.jpg);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Contact Admin TTIC Padang</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>c_user">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
			<div class="container">
				<div class="row d-flex align-items-stretch no-gutters">
          <div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
            <h4>Form kritik & saran</h4>
						<form action="<?=base_url('c_user/send_saran');?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" name="nama" class="form-control" placeholder="Your Name"required>
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Your Email"required>
              </div>
              <div class="form-group">
                <input type="text" name="subject" class="form-control" placeholder="Subject"required>
              </div>
              <div class="form-group">
                <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
					</div>
					<div class="col-md-6 d-flex align-items-stretch">
						<!-- <div id="map"></div> -->
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18455.68079556716!2d100.59037758558128!3d-0.46418086905477174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd52d6aefdccbad%3A0xf65d2d89fb2510b4!2sSDIT%20QURRATA%20A&#39;YYUN%20BATUSANGKAR!5e1!3m2!1sid!2sid!4v1625814490003!5m2!1sid!2sid" width="800" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        
          </div>
				</div>
			</div>
		</section>

	