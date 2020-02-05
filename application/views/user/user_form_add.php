<section class="content-header">
    <h1>Users
        <small>Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-users"></i></a></li>
        <li class="active">Users</li>
    </ol>
</section>
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Add Users</h3>
			<div class="pull-right">
				<a href="<?=base_url('user')?>" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="" method="post">
						<div class="form-group <?=form_error('fullname') ? 'has-error' : null?>">
							<label>Name *</label>
							<input type="text" class="form-control" value="<?=set_value('fullname')?>" name="fullname">
							<span class="help-block"><?=form_error('fullname')?></span>
						</div>
						<div class="form-group <?=form_error('username') ? 'has-error' : null?>">
							<label>Username *</label>
							<input type="text" class="form-control" value="<?=set_value('username')?>" name="username">
							<span class="help-block"><?=form_error('username')?></span>
						</div>
						<div class="form-group <?=form_error('password') ? 'has-error' : null?>">
							<label>Password *</label>
							<input type="password" class="form-control" value="<?=set_value('password')?>" name="password">
							<span class="help-block"><?=form_error('password')?></span>
						</div>
						<div class="form-group <?=form_error('passconf') ? 'has-error' : null?>">
							<label>Password Confirmation *</label>
							<input type="password" class="form-control" value="<?=set_value('passconf')?>" name="passconf">
							<span class="help-block"><?=form_error('passconf')?></span>
						</div>
						<div class="form-group <?=form_error('address') ? 'has-error' : null?>">
							<label>Address</label>
							<textarea class="form-control" name="address"><?=set_value('address')?></textarea>
							<span class="help-block"><?=form_error('address')?></span>
						</div>
						<div class="form-group <?=form_error('level') ? 'has-error' : null?>">
							<label>Level *</label>
							<select class="form-control" name="level">
								<option value="">--Pilih--</option>
								<option value="1"<?=set_value('level') == 1 ? "selected" : null ?>>Admin</option>
								<option value="2"<?=set_value('level') == 2 ? "selected" : null ?>>Kasir</option>
								<option value="2"<?=set_value('level') == 3 ? "selected" : null ?>>User</option>
							</select>
							<span class="help-block"><?=form_error('level')?></span>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
							<button type="Reset" class="btn">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>