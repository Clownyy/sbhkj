<section class="content-header">
    <h1>Data Anggota</h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-users"></i></a></li>
        <li class="active">Anggota</li>
    </ol>
</section>
<section class="content">
	<?php $this->load->view('messages'); ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Anggota SBH Kramat Jati</h3>
			<div class="pull-right">
				<button type="button" data-toggle="modal" data-target="#addAnggota" class="btn btn-primary"><i class="fa fa-user-plus"></i> New Anggota</button>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="tableAll">
				<thead>
					<th>#</th>
					<th>Nama Lengkap</th>
					<th>Tempat Lahir</th>
					<th>Tanggal Lahir</th>
					<th>Angkatan</th>
					<th>Asal Sekolah</th>
					<th>Asal Gugus Depan</th>
					<th>Actions</th>
				</thead>
				<tbody>
					<?php $no = 1; foreach($member->result() as $m){ ?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$m->fullname?></td>
						<td><?=$m->birth_place?></td>
						<td><?= date_format(new DateTime($m->birth_date), 'd M Y')?></td>
						<td><?=$m->tahun?></td>
						<td><?=$m->asal_sekolah?></td>
						<td><?=$m->asal_gudep?></td>
						<td>
							<button type="button" data-toggle="modal" data-target="#editAnggota<?=$m->member_id?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Update</button>
							<a href="<?=base_url('anggota/delete/'.$m->member_id)?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<div class="modal fade" id="addAnggota" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">New Anggota</h4>
			</div>
			<form action="<?=base_url('anggota/add')?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Nama Lengkap</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="fullname" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Tempat Lahir</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="birth_place" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Tanggal Lahir</label>
							</div>
							<div class="col-md-9">
								<input type="date" class="form-control" name="birth_date" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Tahun Aktif</label>
							</div>
							<div class="col-md-9">
								<input type="number" class="form-control" name="tahun" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Asal Sekolah</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="asal_sekolah" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Gugus Depan</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="asal_gudep" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Alamat</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="address" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
		            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
		        </div>
			</form>
		</div>
	</div>
</div>
<?php foreach($member->result() as $m){ ?>
<div class="modal fade" id="editAnggota<?=$m->member_id?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">New Anggota</h4>
			</div>
			<form action="<?=base_url('anggota/edit')?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Nama Lengkap</label>
							</div>
							<div class="col-md-9">
								<input type="hidden" value="<?=$m->member_id?>" name="member_id" required>
								<input type="text" class="form-control" value="<?=$m->fullname?>" name="fullname" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Tempat Lahir</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" value="<?=$m->birth_place?>" name="birth_place" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Tanggal Lahir</label>
							</div>
							<div class="col-md-9">
								<input type="date" class="form-control" value="<?=$m->birth_date?>" name="birth_date" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Tahun Aktif</label>
							</div>
							<div class="col-md-9">
								<input type="number" class="form-control" value="<?=$m->tahun?>" name="tahun" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Asal Sekolah</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" value="<?=$m->asal_sekolah?>" name="asal_sekolah" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Gugus Depan</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" value="<?=$m->asal_gudep?>" name="asal_gudep" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Alamat</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" value="<?=$m->address?>" name="address" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
		            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
		        </div>
			</form>
		</div>
	</div>
</div>
<?php } ?>