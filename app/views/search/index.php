<div class="container">

<h3 class="mt-4">SHOWING RESULTS FOR : "<?=$data['search']?>" </h3><hr>
<?php foreach ($data['searchResult'] as $key => $event): ?>

	<div class="card mt-3" >
		<div class="card-body">
			<a href="<?=ROOTURL.'/event/'.$event['id']?>"style="text-decoration: none;">
			<div class="row">
				<div class="col-md-2">
					<img class="img-thumbnail" src="<?=ROOTURL?>/public/assets/img/thumbnail/<?=$event['event_poster'] ?>">
				</div>
				<?php 
			  		$date=date_create($event['event_date']);
			  	 ?>
				<div class="col-md-10">
					<div class="col-md-12">
						<h3 class="text-info"><?=$event['event_title'] ?></h3>
						<h5 class="text-info"><?=date_format($date,"l, j F Y"). ' at '.date_format($date,"H:i")?></h5>
						<hr>
						<div class="progress" style="height: 5px;">
						  <div class="progress-bar" role="progressbar" 
						  style="width: <?= $event['remaining_slot']/$event['event_slot']*100?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<button class="btn btn-success btn-sm disabled mt-3"><?= $event['remaining_slot'].' / '.$event['event_slot']?> Available</button>
					</div>
				</div>
			</div>
		    </a>		
		</div>
	</div>
	
<?php endforeach ?>

<?php 
	
	if ($data['searchResult'] == NULL) {
		?>
		<div class="d-flex justify-content-center mt-5 pt-5">
			<h3>0 Result found!(</h3>

		</div>
		<div class="d-flex justify-content-center mt-3">
			<h5>Try with event tag or title</h5>
			
		</div><?php
	}
 ?>


</div>