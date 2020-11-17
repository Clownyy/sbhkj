<section class="content-header">
    <h1>Random Name</h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-users"></i></a></li>
        <li class="active">Get Random Name</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data Anggota SBH Kramat Jati</h3>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<th>#</th>
							<th>Nama Lengkap</th>
							<th>Gugus Depan</th>
						</thead>
						<tbody>
							<?php $no = 1; foreach($member->result() as $m){ ?>
							<tr>
								<td><?=$no++?></td>
								<td><?=$m->fullname?></td>
								<td><?=$m->gudep?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<br>
					<div class="pull-right">
						<button class="btn btn-success" id="generate" onclick="generateRandomName()"><i class="fa fa-download"></i> Generate Random Name</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<center><h3 class="box-title">Tantangan atau Tantangan</h3></center>
				</div>
				<div class="box-body">
					<div class="row">
						<?php $no=1; foreach($dod->result() as $d){ ?>
							<div class="col-md-4">
								<button class="btn btn-<?=$d->warna?>" id="btn<?=$d->chall_id?>" onclick="chooseColor(<?=$d->chall_id?>)" style="width: 100%; height: 100px; margin-bottom: 8px; font-size: 25pt"><?=$no++?></button>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	function generateRandomName() {
		$.ajax({
			url : "<?=base_url('playzone/generateRandomName')?>",
			type: "GET",
			success: function(data){
				var dataMember = JSON.parse(data)
				swal({
					title: dataMember.fullname + ' dari ' + dataMember.gudep,
					text: "Silahkan Pilih warna untuk tantangan!"
				})
				// $('#randomName').html(dataMember.fullname+' dari '+dataMember.gudep)
			}
		})
	}
	function chooseColor($id) {
		var selected = $id
		$.ajax({
			url : "<?=base_url('playzone/getChallengeByColor/"+selected+"')?>",
			type: "GET",
			success: function(data){
				var dataChallenge = JSON.parse(data)
				swal({
					title: "Tantangan untukmu",
					icon: "success",
					text: dataChallenge.tantangan,
				})
				$("#btn"+dataChallenge.chall_id).attr("disabled", true)
			}
		})
	}
</script>