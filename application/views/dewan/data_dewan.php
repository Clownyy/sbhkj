<section class="content-header">
    <h1>Data Dewan</h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-users"></i></a></li>
        <li class="active">Dewan</li>
    </ol>
</section>
<section class="content">
	<?php $this->load->view('messages'); ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Dewan SBH Kramat Jati</h3>
			<div class="pull-right">
				<button type="button" data-toggle="modal" data-target="#addDewan" class="btn btn-primary"><i class="fa fa-user-plus"></i> New Dewan</button>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="tableAll">
				<thead>
					<th>#</th>
					<th>Nama Lengkap</th>
					<th>Kode Unik</th>
					<th>Jabatan</th>
					<th>Status</th>
					<th>Actions</th>
				</thead>
				<tbody>
					<?php $no = 1; foreach($dewan->result() as $d){ ?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$d->name?></td>
						<td><?=$d->unique_code?></td>
						<td><?=$d->jabatan?> SBH Kramat Jati</td>
						<td>
							<?php if($d->status == 'Aktif'){?>
								<span class="label label-success">Aktif</span>
							<?php }else{?>
								<span class="label label-danger">Non Aktif</span>
							<?php }?>
						</td>
						<td>
							<button type="button" data-toggle="modal" data-target="#editDewan<?=$d->dewan_id?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Update</button>
							<a href="<?=base_url('dewan/delete/'.$d->dewan_id)?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<div class="modal fade" id="addDewan" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">New Dewan</h4>
			</div>
			<form action="<?=base_url('dewan/add')?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Nama Lengkap</label>
							</div>
							<div class="col-md-9">
								<select class="form-control" name="member_id" id="member_id" required>
										<option>--Pilih--</option>
									<?php foreach ($member->result() as $m) {?>
										<option value="<?=$m->member_id?>"><?=$m->fullname?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Jabatan</label>
							</div>
							<div class="col-md-9">
								<select class="form-control" name="jabatan" required>
									<option value="Ketua Dewan">Ketua Dewan</option>
									<option value="Wakil Ketua Dewan">Wakil Ketua Dewan</option>
									<option value="Sekretaris Dewan">Sekretaris Dewan</option>
									<option value="Bendahara Dewan">Bendahara Dewan</option>
									<option value="Ketua Krida">Ketua Krida</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Kode Unik</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="unique_code" id="unique_code" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Status</label>
							</div>
							<div class="col-md-9">
								<select class="form-control" name="status" required>
									<option value="Aktif">Aktif</option>
									<option value="Non Aktif">Non Aktif</option>
								</select>
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
<?php foreach($dewan->result() as $d) { ?>
<div class="modal fade" id="editDewan<?=$d->dewan_id?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Dewan</h4>
			</div>
			<form action="<?=base_url('dewan/edit')?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Nama Lengkap</label>
							</div>
							<div class="col-md-9">
								<input type="hidden" value="<?=$d->dewan_id?>" name="dewan_id" required>
								<select class="form-control" name="member_id" disabled="true">
									<?php foreach ($allMember->result() as $m) {?>
										<option value="<?=$m->member_id?>" <?=$m->member_id == $d->member_id ? "selected" : null ?>><?=$m->fullname?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Jabatan</label>
							</div>
							<div class="col-md-9">
								<select class="form-control" name="jabatan" required>
									<?php if ($d->jabatan == 'Ketua Dewan'): ?>
										<option value="Ketua Dewan" selected>Ketua Dewan</option>
										<option value="Wakil Ketua Dewan">Wakil Ketua Dewan</option>
										<option value="Sekretaris Dewan">Sekretaris Dewan</option>
										<option value="Bendahara Dewan">Bendahara Dewan</option>
										<option value="Ketua Krida">Ketua Krida</option>
									<?php endif ?>
									<?php if ($d->jabatan == 'Wakil Ketua Dewan'): ?>
										<option value="Ketua Dewan">Ketua Dewan</option>
										<option value="Wakil Ketua Dewan" selected>Wakil Ketua Dewan</option>
										<option value="Sekretaris Dewan">Sekretaris Dewan</option>
										<option value="Bendahara Dewan">Bendahara Dewan</option>
										<option value="Ketua Krida">Ketua Krida</option>
									<?php endif ?>
									<?php if ($d->jabatan == 'Sekretaris Dewan'): ?>
										<option value="Ketua Dewan">Ketua Dewan</option>
										<option value="Wakil Ketua Dewan">Wakil Ketua Dewan</option>
										<option value="Sekretaris Dewan" selected>Sekretaris Dewan</option>
										<option value="Bendahara Dewan">Bendahara Dewan</option>
										<option value="Ketua Krida">Ketua Krida</option>
									<?php endif ?>
									<?php if ($d->jabatan == 'Bendahara Dewan'): ?>
										<option value="Ketua Dewan">Ketua Dewan</option>
										<option value="Wakil Ketua Dewan">Wakil Ketua Dewan</option>
										<option value="Sekretaris Dewan">Sekretaris Dewan</option>
										<option value="Bendahara Dewan" selected>Bendahara Dewan</option>
										<option value="Ketua Krida">Ketua Krida</option>
									<?php endif ?>
									<?php if ($d->jabatan == 'Ketua Krida'): ?>
										<option value="Ketua Dewan">Ketua Dewan</option>
										<option value="Wakil Ketua Dewan">Wakil Ketua Dewan</option>
										<option value="Sekretaris Dewan">Sekretaris Dewan</option>
										<option value="Bendahara Dewan">Bendahara Dewan</option>
										<option value="Ketua Krida" selected>Ketua Krida</option>
									<?php endif ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Kode Unik</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="unique_code" value="<?=$d->unique_code?>" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Status</label>
							</div>
							<div class="col-md-9">
								<select class="form-control" name="status" required>
									<?php if ($d->status == 'Aktif'): ?>
										<option value="Aktif" selected>Aktif</option>
										<option value="Non Aktif">Non Aktif</option>
									<?php endif ?>
									<?php if ($d->status == 'Non Aktif'): ?>
										<option value="Aktif">Aktif</option>
										<option value="Non Aktif" selected>Non Aktif</option>
									<?php endif ?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
		            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update</button>
		        </div>
			</form>
		</div>
	</div>
</div>
<?php } ?>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script>
	$('#member_id').change(function(){
		var selected =  $(this).val()
		$.ajax({
			url : "<?=base_url('dewan/getDataMember/"+selected+"')?>",
			type: "GET",
			success: function(data){
				var dataMember = JSON.parse(data)
				$('#unique_code').val("KJ-"+dataMember.tahun+"/")
			}
		})
	})
</script>