<section class="content-header">
    <h1>Stock out
        <small>Barang Keluar / Penjualan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-users"></i></a></li>
        <li>Transaction</li>
        <li class="active">Stock out</li>
    </ol>
</section>
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Add Stock out</h3>
			<div class="pull-right">
				<a href="<?=base_url('stock/out')?>" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="<?=base_url('stock/process_out')?>" method="post">
						<div class="form-group">
							<div class="row">
								<div class="col-md-8">
									<label>Date *</label>
									<input type="date" class="form-control" value="<?=date('Y-m-d')?>" name="date" required>
									<input type="hidden" name="user_id" value="<?=$this->session->userdata('userid')?>">
								</div>
								<div class="col-md-4">
									<label for="barcode">Barcode *</label>
									<select class="form-control" name="item_id" id="barcode">
										<option value="">- Pilih -</option>
										<?php foreach($item->result() as $key => $i){ ?>
											<option value="<?=$i->item_id?>"><?=$i->barcode?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<!-- <div>
							<label for="barcode">Barcode *</label>
						</div>
						<div class="form-group input-group">
							<input type="hidden" name="item_id" id="item_id">
							<input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
							<span class="input-group-btn">
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-item"><i class="fa fa-search"></i></button>
							</span>
						</div> -->
						<div class="form-group">
							<label for="item_name">Item Name *</label>
							<input type="text" name="item_name" id="item_name" value="-" class="form-control" readonly>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-8">
									<label for="unit_name">Item Unit</label>
									<input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
								</div>
								<div class="col-md-4">
									<label for="stock">Initial Stock</label>
									<input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Detail *</label>
							<input type="text" name="detail" class="form-control" placeholder="Kulakan / Tambahan / etc" required>
						</div>
						<div class="form-group">
							<label>Qty *</label>
							<input type="number" name="qty" class="form-control" required>
						</div>
						<div class="form-group">
							<button type="submit" name="out_add" class="btn btn-success">
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
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script>
	$('#barcode').change(function(){
		var selected =  $(this).val()
		$.ajax({
			url : "<?=base_url('stock/getdataitem/"+selected+"')?>",
			type: "GET",
			success: function(data){
				var apa = JSON.parse(data)
				$('input[name=item_name]').val(apa.name)
				$('input[name=stock]').val(apa.stock)
				$('input[name=unit_name]').val(apa.unit_name)
			}
		})
	})
</script>