<section class="content-header">
    <h1>Category
        <small>Kategori</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-users"></i></a></li>
        <li class="active">category</li>
    </ol>
</section>
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page)?> categories</h3>
			<div class="pull-right">
				<a href="<?=base_url('category')?>" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="<?=base_url('category/process')?>" method="post">
						<div class="form-group">
							<input type="hidden" name="category_id" value="<?=$row->category_id?>">
							<label>Category Name *</label>
							<input type="text" class="form-control" value="<?=$row->name?>" name="category_name" required>
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