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
						<td><?=$m->birth_date?></td>
						<td><?=$m->tahun?></td>
						<td><?=$m->asal_sekolah?></td>
						<td><?=$m->asal_gudep?></td>
						<td>
							<button type="button" data-toggle="modal" data-target="#editDewan<?=$m->member_id?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Update</button>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>