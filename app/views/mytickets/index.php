<div class="container">
	
	<div class="card mt-3">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<h4 class="card-header">Your Validated Tickets</h4>
					<br>

					<?php foreach ($data['validated'] as $key => $ticket): ?>
						
					<div class="card border-info p-3 mt-2">
						<div class="row">
							<div class="col-md-2">
								<img class="img-thumbnail" src="<?=ROOTURL ?>/public/assets/img/thumbnail/<?=$ticket['event_poster'] ?>">
							</div>
							<?php 
							  		$date=date_create($ticket['event_date']);
							  	 ?>
							<div class="col-md-7 text-info">
								<h5><?=$ticket['event_title']?></h5>
								on <strong><?=date_format($date,"l, j F Y").' at '.date_format($date,"H:i")?></strong><hr>
								<?=$ticket['booking_code']?>
							</div>
							<div class="col-md-3">
								<img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?=$ticket['booking_code']?>">
							</div>
						</div>
					</div>

					<?php endforeach ?>

				</div>
				<div class="col-md-6">
					<h4 class="card-header">Your Unvalidated Tickets</h4>
					<br>

					<?php foreach ($data['unvalidated'] as $key => $ticket): ?>
						
					<div class="card border-info p-3 mt-2">
						<div class="row">
							<div class="col-md-2">
								<img class="img-thumbnail" src="<?=ROOTURL ?>/public/assets/img/thumbnail/<?=$ticket['event_poster'] ?>">
							</div>
							<?php 
							  		$date=date_create($ticket['event_date']);
							  	 ?>
							<div class="col-md-7 text-info">
								<h5><?=$ticket['event_title']?></h5>
								on <strong><?=date_format($date,"l, j F Y").' at '.date_format($date,"H:i")?></strong><hr>
								Status : <?=$ticket['validity']?>
							</div>
							<div class="col-md-3">
								<img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=Ticket%20Status:%20<?=$ticket['validity']?>">
							</div>
						</div>
					</div>

					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</div>