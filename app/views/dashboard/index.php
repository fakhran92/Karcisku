<div class="container mt-3">
	<div class="row">
		<div class="col-md-12">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="<?=ROOTURL?>/public/assets/img/slideshow/1.png" class="d-block w-100" alt="...">
			    </div>
			    <div class="carousel-item">
			      <img src="<?=ROOTURL?>/public/assets/img/slideshow/2.png" class="d-block w-100" alt="...">
			    </div>
			    <div class="carousel-item">
			      <img src="<?=ROOTURL?>/public/assets/img/slideshow/3.png" class="d-block w-100" alt="...">
			    </div>
			    <div class="carousel-item">
			      <img src="<?=ROOTURL?>/public/assets/img/slideshow/4.png" class="d-block w-100" alt="...">
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
	</div>
	<hr>
	<div class="card card-body">
		<h1 class="display-4 mb-0 pb-0">WHAT'S NEW</h1><br><hr class="mt-0">
		<!-- category 1 -->
		<h2 class="p-1 mt-0">Webinar</h2>
		<div class="row">
			<?php if ($data['webinars'] == NULL): ?>
				<div class="col-md-12 ml-2">
					Nothing Here... :(
				</div>
			<?php endif ?>
			<?php foreach ($data['webinars'] as $key => $webinar): ?>
				
			<div class="col-md-2">
				<a class="nav-link p-0 m-0" href="<?=ROOTURL?>/event/<?=$webinar['id']?>"><img src="<?=ROOTURL?>/public/assets/img/thumbnail/<?=$webinar['event_poster'] ?>" class="img-thumbnail" alt="...">
				<p class="p-1"><span class="text-primary"><?=$webinar['event_title'] ?></span></p></a>
			</div>
			
			<?php endforeach ?>
		</div>
		<hr>
		<!-- category 2 -->
		<h2 class="p-1">Concert</h2>
		<div class="row">
			<?php if ($data['concerts'] == NULL): ?>
				<div class="col-md-12 ml-2">
					Nothing Here... :(
				</div>
			<?php endif ?>
			<?php foreach ($data['concerts'] as $key => $concert): ?>
				
			<div class="col-md-2">
				<a class="nav-link p-0 m-0" href="<?=ROOTURL?>/event/<?=$concert['id']?>"><img src="<?=ROOTURL?>/public/assets/img/thumbnail/<?=$concert['event_poster'] ?>" class="img-thumbnail" alt="...">
				<p class="p-1"><span class="text-primary"><?=$concert['event_title'] ?></span></p></a>
			</div>
			
			<?php endforeach ?>
		</div><hr>
		<!-- category 2 -->
		<h2 class="p-1">Theater</h2>
		<div class="row">
			<?php if ($data['theaters'] == NULL): ?>
				<div class="col-md-12 ml-2">
					Nothing Here... :(
				</div>
			<?php endif ?>
			<?php foreach ($data['theaters'] as $key => $theater): ?>
				
			<div class="col-md-2">
				<a class="nav-link p-0 m-0" href="<?=ROOTURL?>/event/<?=$theater['id']?>"><img src="<?=ROOTURL?>/public/assets/img/thumbnail/<?=$theater['event_poster'] ?>" class="img-thumbnail" alt="...">
				<p class="p-1"><span class="text-primary"><?=$theater['event_title'] ?></span></p></a>
			</div>
			
			<?php endforeach ?>
		</div>
	</div>
</div>