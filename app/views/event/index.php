<div class="container mt-3">
	<?php foreach ($data['event'] as $key => $event): ?>
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
						<h1 class="pl-1">Event Detail</h1>
					<div class="row">
						<div class="col-md-4">
							<img src="<?=ROOTURL?>/public/assets/img/thumbnail/<?=$event['event_poster']?>" class="img-thumbnail" width="500">
						</div>
						<div class="col-md-8">
							<dl class="row">
							  <dt class="col-sm-4">Event Name</dt>
							  <dd class="col-sm-8"><?=$event['event_title']?></dd>

							  <dt class="col-sm-4">Date & Time</dt>
							  <dd class="col-sm-8">
							  	<?php 
							  		$date=date_create($event['event_date']);
							  	 ?>
							    <p class="mb-0"><?=date_format($date,"l, j F Y")?></p>
							    <p class="mt-0"><?='at '.date_format($date,"H:i")?></p>
							  </dd>

							  <dt class="col-sm-4">Location</dt>
							  <dd class="col-sm-8"><?=$event['event_location']?></dd>

							  <dt class="col-sm-4">Ticket Price</dt>
							  <dd class="col-sm-8">Rp. <?=$event['event_price']?></dd>

							  <dt class="col-sm-4">Available tickets</dt>
							  <dd class="col-sm-8">
							  	<?php 
							  	if ($event['remaining_slot'] == 0) {
							  		echo '<strong class="text-danger">SOLD OUT</strong>';
							  	}else{
							  		echo $event['remaining_slot'].' Available of '.$event['event_slot'];
							  	}

							  	 ?>
							  	 <input hidden readonly type="text" id="remain" value="<?= $event['remaining_slot']?>">
							  	

							  </dd>
							</dl>
						</div>
					</div><hr>
					<div class="col-md-12 mt-2">
						<?=$event['event_description']?>
					</div>
				</div>

			</div>
		</div>
		<div class="col-md-3" id="buatbeli">
			<div class="card">
				<div class="card-body">
					<div class="col-md-12 icon">
						<i class="fas fa-shopping-cart"></i> Buy Ticket
					</div>
					<hr>

					<div class="row">
						<div class="col-md-4">
							<img src="<?=ROOTURL?>/public/assets/img/thumbnail/<?=$event['event_poster']?>" class="rounded mx-auto d-block" width="40">
						</div>
						<div class="col-md-8">
							<input type="number" name="amount" id="amount" class="form-control" min="1" max="<?=$event['remaining_slot']?>" placeholder="Amount" required value="1">
						</div>
						<div class="col-md-12 mt-4">
							<button onclick="copyamount()" type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#purchaseModal">
							  <i class="fas fa-star"></i> Book now
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach ?>
</div>


<!-- Modal -->
<div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        Your Order is : <span id="amountView" class="font-weight-bold">5</span> ticket(s) of <span id="titleView" class="font-weight-bold"><?=$event['event_title']?></span>
		<form enctype="multipart/form-data" method="POST" action="<?=ROOTURL?>/event/order">
        <div class="row mt-2">
        	<div class="col-md-3 ">
        	<input class="form-control" type="number" id="amountView2" name="orderAmount"readonly="">
        		
        	</div>&times;
        	<div class="col-md-4">
        	<input class="form-control" type="number" id="thePrice" readonly="" value="<?php 
        	$price = (int)$event['event_price'];echo $price.'000'?>">
        		
        	</div>&equals;
        	<div class="col-md-4">
        	<input class="form-control" type="text" id="finalPrice" name="totalPrice" readonly="">
        	</div>
        	<br><br><h4 class="col-md-12 mt-2">TOTAL : <span id="theFinal"></span></h4>
        </div>

        <br>
        <br>

        <strong class="text-danger">Payment Instructions</strong>
        <br>
        1. Dont close this popup, or else your order will be canceled <br>
        2. Transfer the final price to this bank account <strong>BNI 8265036422 PT.Karcisku</strong> <br>
        3. After transfer the money, you should upload the transfer proof here. <br><br>
        	
			  <div class="input-group mb-3">
			  <div class="custom-file">
			    <input required type="file" class="custom-file-input" id="inputFile" name="uploaded_file">
			    <label class="custom-file-label" for="inputFile">Upload transfer receipt</label>
			  </div>
			</div>

		<br>
		4. By clicking upload button below your order will be send to our admin and will be validated between 1x24 hours, your validated tickets will be on your "My Tickets" page.
 <br><br>
 			<input type="text" name="event_id" value="<?=$data['eventid']?>" hidden>
 			
      </div>
      <div class="modal-footer">
		     <button type="submit" id="tblup" class="btn btn-success">Upload Transfer Receipt</button>
			</form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	function copyamount()
	{
		document.getElementById('amountView').innerHTML = document.getElementById('amount').value;
		document.getElementById('amountView2').value = document.getElementById('amount').value;
		


		var	x = document.getElementById('amountView2').value;

		var y = document.getElementById('thePrice').value;

		  ;


		// Create our number formatter.
		var formatter = new Intl.NumberFormat('en-US', {
		  style: 'currency',
		  currency: 'IDR',

		  // These options are needed to round to whole numbers if that's what you want.
		  minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
		  maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
		});

		document.getElementById('finalPrice').value = formatter.format(x*y); /* $2,500.00 */
		document.getElementById('theFinal').innerHTML = formatter.format(x*y); /* $2,500.00 */

	}

$( document ).ready(function() {
   if (document.getElementById('remain').value== 0) {
		console.log('ok');
		document.getElementById('buatbeli').hidden = true;
	}
});


</script>