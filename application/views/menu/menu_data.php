<style>
	.row{
		padding-bottom: 8px;
	}
</style>
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
	<div class="box">
		<div class="box-header">
			<div class="text-right">
				<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addMenu"><i class="fa fa-plus"></i> Tambah Menu</button>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Barcode</th>
						<th>Menu</th>
						<th>Jenis</th>
						<th>Harga</th>
						<th>Foto</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach($menus->result() as $m){ ?>
					<tr>
						<td><?=$no++?></td>
						<td>
							<?php 
							$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
							echo '<img src="data:image/png;base64,'.base64_encode($generator->getBarcode($m->barcode, $generator::TYPE_CODE_128)).'">';
							?><br>
							<?=$m->barcode?>
						</td>
						<td><?=$m->nama_menu?></td>
						<td><?=$m->jenis?></td>
						<td>Rp. <?=number_format($m->harga, 2, ',', '.')?></td>
						<td><img style="width: 50px; height: 50px;" src="<?=base_url('assets/uploads/menu/'.$m->foto)?>"></td>
						<td>
							<?php if($m->status_menu == 1) { ?>
								<label class="label label-success">READY</label>
							<?php }elseif($m->status_menu == 0) {?>
								<label class="label label-danger">EMPTY</label>
							<?php } ?>
						</td>
						<td>
							<center>
								<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateMenu<?=$m->id_menu?>"><i class="fa fa-edit"></i></button>
								<a href="<?=base_url('menu/deleteMenu/'.$m->id_menu)?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
							</center>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah menu baru</h5>
      </div>
      <form action="<?=base_url('menu/insert')?>" method="post" enctype="multipart/form-data">
      	<div class="modal-body">
	      	<div class="row">
	      		<div class="col-md-3">
	      			<label>Nama Menu</label>
	      		</div>
	      		<div class="col-md-9">
	      			<input type="text" class="form-control" name="nama_menu">
	      		</div>
	      	</div>
	      	<div class="row">
	      		<div class="col-md-3">
	      			<label>Jenis Menu</label>
	      		</div>
	      		<div class="col-md-9">
	      			<select class="form-control" name="jenis">
	      				<?php foreach($kategori->result() as $k) {?>
	      					<option value="<?=$k->name?>"><?=$k->name?></option>
	      				<?php } ?>
	      			</select>
	      		</div>
	      	</div>
	      	<div class="row">
	      		<div class="col-md-3">
	      			<label>Harga</label>
	      		</div>
	      		<div class="col-md-9">
	      			<input type="number" class="form-control" name="harga">
	      		</div>
	      	</div>
	      	<div class="row">
	      		<div class="col-md-3">
	      			<label>Foto Menu</label>
	      		</div>
	      		<div class="col-md-9">
	      			<input type="file" onchange="readURL1(this)" class="form-control" name="foto">
	      		</div>
	      	</div>
	      	<div class="row">
	      		<div class="col-md-3"></div>
	      		<div class="col-md-9">
	      			<img src="" id="blah1" style="width: 100px; height: 100px;">
	      		</div>
	      	</div>
	      	<div class="row">
	      		<div class="col-md-3">
	      			<label>Status Menu</label>
	      		</div>
	      		<div class="col-md-9">
	      			<select class="form-control" name="status_menu">
	      				<option value="0">EMPTY</option>
	      				<option value="1">READY</option>
	      			</select>
	      		</div>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
      </form>
    </div>
  </div>
</div>
<?php foreach ($menus->result() as $m) { ?>
<div class="modal fade" id="updateMenu<?=$m->id_menu?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update menu <?=$m->nama_menu?></h5>
      </div>
      <form action="<?=base_url('menu/update')?>" method="post" enctype="multipart/form-data">
      	<div class="modal-body">
      		<div class="row">
	      		<div class="col-md-3">
	      			<label>Barcode</label>
	      		</div>
	      		<div class="col-md-9">
	      			<input type="hidden" value="<?=$m->id_menu?>" name="id_menu">
	      			<input type="text" class="form-control" name="barcode" readonly value="<?=$m->barcode?>">
	      		</div>
	      	</div>
	      	<div class="row">
	      		<div class="col-md-3">
	      			<label>Nama Menu</label>
	      		</div>
	      		<div class="col-md-9">
	      			<input type="text" class="form-control" name="nama_menu" value="<?=$m->nama_menu?>">
	      		</div>
	      	</div>
	      	<div class="row">
	      		<div class="col-md-3">
	      			<label>Jenis Menu</label>
	      		</div>
	      		<div class="col-md-9">
	      			<select class="form-control" name="jenis">
	      				<?php foreach($kategori->result() as $k) {?>
	      					<option value="<?=$k->name?>" <?=$k->name == $m->jenis ? "selected" : null?>><?=$k->name?></option>
	      				<?php } ?>
	      			</select>
	      		</div>
	      	</div>
	      	<div class="row">
	      		<div class="col-md-3">
	      			<label>Harga</label>
	      		</div>
	      		<div class="col-md-9">
	      			<input type="number" class="form-control" name="harga" value="<?=$m->harga?>">
	      		</div>
	      	</div>
	      	<div class="row">
	      		<div class="col-md-3">
	      			<label>Foto Menu</label>
	      		</div>
	      		<div class="col-md-9">
	      			<input type="file" onchange="readURL1(this)" class="form-control" name="foto">
	      		</div>
	      	</div>
	      	<div class="row">
	      		<div class="col-md-3"></div>
	      		<div class="col-md-9">
	      			<img src="<?=base_url('assets/uploads/menu/'.$m->foto)?>" id="blah1" style="width: 100px; height: 100px;">
	      		</div>
	      	</div>
	      	<div class="row">
	      		<div class="col-md-3">
	      			<label>Status Menu</label>
	      		</div>
	      		<div class="col-md-9">
	      			<select class="form-control" name="status_menu">
	      				<?php if($m->status_menu == 0): ?>
	      					<option value="0" selected>EMPTY</option>
	      					<option value="1">READY</option>
	      				<?php endif ?>
	      				<?php if($m->status_menu == 1): ?>
	      					<option value="0">EMPTY</option>
	      					<option value="1" selected>READY</option>
	      				<?php endif ?>
	      			</select>
	      		</div>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>