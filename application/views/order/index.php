<section class="content-header">
	<h1>Menu
		<small>Menu</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href=""></a></li>
		<li>Menu</li>
		<li class="active">Menu</li>
	</ol>
</section>
<section class="content">
	<?php $this->load->view('messages'); ?>
	<div class="row">
		<?php foreach ($menu->result() as $m) {?>
			<form action="<?=base_url('transaction/cartStore')?>" method="post">
				<div class="col-md-4">
					<div class="box">
						<div class="box-body">
							<img src="<?=base_url('assets/uploads/menu/'.$m->foto)?>" class="card-img-top" style="width:325px;height:200px">
							<div class="card-body">
								<input type="hidden" name="user_id" value="<?=$this->session->userdata('userid')?>">
								<input type="hidden" name="menu_id" value="<?=$m->id_menu?>">
								<h5 class="card-title"><b><?=$m->nama_menu?></b></h5>
								<p class="card-text">Rp.<?=number_format($m->harga, 2,',','.')?></p>
								<input type="number" class="form-control" name="qty"><br>
								<button class="btn btn-primary btn-block"><b><i class="fa fa-plus"></i></b></button>
							</div>
						</div>
					</div>
				</div>
			</form>
		<?php } ?>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">Pesanan Anda</div>
				<form action="<?= base_url('transaction/moveOrder') ?>" method="post">
					<div class="box-body table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>NO.</th>
									<th>Barcode</th>
									<th>Menu</th>
									<th>Jumlah</th>
									<th colspan="2">Total Harga</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach ($carts->result() as $c) {?>
									<tr>
										<td><?=$no++?></td>
										<td>
											<?php 
											$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
											echo '<img src="data:image/png;base64,'.base64_encode($generator->getBarcode($c->barcode_menu, $generator::TYPE_CODE_128)).'">';
											?><br>
											<?=$c->barcode_menu?>
											<input type="hidden" name="user_id" value="<?=$c->user_id?>">
										</td>
										<td><?=$c->menu?></td>
										<td><?=$c->jumlah?></td>
										<td>Rp. <?=number_format($c->sub_total, 2, ',', '.')?></td>
										<td><center><a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a></center></td>
									</tr>
								<?php } ?>
							</tbody>
						</table><br>
						<input type="text" class="form-control" name="keterangan" placeholder="Catatan tambahan">
						<hr>
						<div class="text-right">
							<p class="h5" style="color: red">*Pastikan pesanan anda sudah benar, setelah anda klik pesan, tidak bisa kembali</p>
							<p class="h2">Total Harga : <b>Rp. <?=number_format($totalCarts, 2, ',', '.')?></b></p>
						</div>
						<div class="box-footer text-right">
							<?php if ($totalCarts != 0) { ?>
								<button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-shopping-cart"></i> Pesan</button>
							<?php } ?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>