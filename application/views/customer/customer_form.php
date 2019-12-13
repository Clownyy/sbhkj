<section class="content-header">
    <h1>Customer
        <small>Pelanggan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-users"></i></a></li>
        <li class="active">customers</li>
    </ol>
</section>
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page)?> customers</h3>
			<div class="pull-right">
				<a href="<?=base_url('customer')?>" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="<?=base_url('customer/process')?>" method="post">
						<div class="form-group">
							<input type="hidden" name="customer_id" value="<?=$row->customer_id?>">
							<label>Customer Name *</label>
							<input type="text" class="form-control" value="<?=$row->name?>" name="customer_name" required>
						</div>
						<div class="form-group">
							<label>Gender *</label>
							<select name="gender" class="form-control" required>
								<option value="">- Pilih -</option>
								<option value="L"<?=$row->gender == 'L' ? 'selected' : ''?>>Laki-Laki</option>
								<option value="P"<?=$row->gender == 'P' ? 'selected' : ''?>>Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label>Phone *</label>
							<input type="number" class="form-control" value="<?=$row->phone?>" name="phone" required>
						</div>
						<div class="form-group">
							<label>Address *</label>
							<textarea name="addr" class="form-control"><?=$row->address?></textarea>
						</div>
						<div class="form-group">
							<button type="submit" name="<?=$page?>" class="btn btn-success">
								<i class="fa fa-paper-plane"></i> Save
							</button>
							<button type="Reset" class="btn">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>