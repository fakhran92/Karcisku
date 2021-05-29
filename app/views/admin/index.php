<div class="container mt-3">
	<div class="row">
		<div class="col-md-4">
			<div class="card card-body">
				<h3>Slideshow</h3>
				<p class="card-title" >Preview Slideshow</p>
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
				  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
				<hr>
				<form enctype="multipart/form-data" action="<?=ROOTURL?>/admin/editSlideshow" method="POST">
					<p>Image to replace : </p>
					<div class="form-group">
					    <select class="form-control" id="slideId" name="image_id">
					      <option value="1">Slideshow image 1</option>
					      <option value="2">Slideshow image 2</option>
					      <option value="3">Slideshow image 3</option>
					      <option value="4">Slideshow image 4</option>
					    </select>
					</div>

					<p>Replace with : </p>
					<div class="input-group mb-3">
					  <div class="custom-file">
					    <input type="file" class="custom-file-input" id="inputFile" name="uploaded_file">
					    <label class="custom-file-label" for="inputFile">Choose file</label>
					  </div>
					</div>
					<p class="text-success">&nbsp;Use <strong>PNG</strong> file with <strong>19 : 5</strong> ratio </p>
					<button type="submit" class="btn btn-primary">Upload</button>
				</form>
			</div>
		</div>

		
		<div class="col-md-8">

			<!-- Section Order Manager -->
			<div class="card card-body">
				<h3 class="card-title">Order Manager</h3>
				<div class="accordion" id="accordionExample">
				  <div class="card">
				    <div class="card-header" id="headingFour">
				      <h2 class="mb-0">
				        <button class="btn btn-primary btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
				          Unvalidated Orders
				        </button>
				      </h2>
				    </div>

				    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordionExample">
				      <div class="card-body">
				        <table class="table table-hover">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Event id</th>
						      <th scope="col">Ticket ordered</th>
						      <th scope="col">Total Price</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php foreach ($data['unvalidated'] as $key => $unvalidated): ?>
						  		
						    <tr>
						      <th scope="row"><?=$key+=1?></th>
						      <td>Event - <?= $unvalidated['event_id'] ?></td>
						      <td><?= $unvalidated['amount'] ?> Ticket(s)</td>
						      <td><?= $unvalidated['total_price'] ?></td>
						      <td> 
						      	<div class="row">
						      		<a href="<?=ROOTURL?>/public/assets/img/proof/<?= $unvalidated['proof_file'] ?>" target="blank" class="btn btn-primary btn-sm">Receipt</a>
						      		<a href="<?=ROOTURL?>/admin/validate/<?= $unvalidated['id'] ?>" class="btn btn-success btn-sm ml-3">Validate</a>
						      		<a href="<?=ROOTURL?>/admin/invalidate/<?= $unvalidated['id'] ?>" class="btn btn-danger btn-sm ml-3">Reject</a>
						      	</div>
						      </td>
						    </tr>
						  	<?php endforeach ?>
						  	<?php 
						  	if ($data['unvalidated']==null) {
						  		?>
						  		<td colspan="5" class="text-center">No Active Order</td>
						  		<?php
						  	}
						  	 ?>
						  </tbody>
						</table>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingTwo">
				      <h2 class="mb-0">
				        <button class="btn btn-primary btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				          Issued Tickets
				        </button>
				      </h2>
				    </div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				      <div class="card-body">
				        <a href="<?=ROOTURL ?>/admin/ticket_history">Show All Issued Ticket History</a>
				      </div>
				    </div>
				  </div>
				</div>
			</div>

			<!-- Section Event Manager -->
			<div class="card card-body mt-3">
				<h3 class="card-title">Events Manager</h3>
				<div class="accordion" id="accordionExample">
				  <div class="card">
				    <div class="card-header" id="headingOne">
				      <h2 class="mb-0">
				        <button class="btn btn-primary btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
				          Add New Event
				        </button>
				      </h2>
				    </div>

				    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
				      <div class="card-body">
				        <form action="<?=ROOTURL?>/admin/addNewEvent" method="POST" enctype="multipart/form-data" > 
				        	<div class="row">
				        		<div class="col-md-7">
				        			<label>Event title</label>
				        			<input type="text" name="title" placeholder="Event title" class="form-control">
				        		</div>
				        		<div class="col-md-5">
				        			<label>Date</label>
				        			<input type="datetime-local" name="date" class="form-control">
				        		</div>
				        	</div>
				        	<div class="row mt-4">
				        		<div class="col-md-7">
				        			<label>Description</label>
				        			<textarea name="description" placeholder="Event Description" class="form-control"></textarea>
				        		</div>
				        		<div class="col-md-5">
				        			<label>Location</label>
				        			<input type="text" name="location" placeholder="Event Location" class="form-control">
				        		</div>
				        	</div>
				        	<div class="row mt-4">
				        		<div class="col-md-4">
				        			<label>Price</label>
				        			<input type="number" name="price" placeholder="Ticket price" class="form-control">
				        		</div>
				        		<div class="col-md-4">
				        			<label>Slot</label>
				        			<input type="number" name="slot" placeholder="Total slot" class="form-control">
				        		</div>
				        		<div class="col-md-4">
				        			<label>Keyword Tag (optional)</label>
				        			<input type="text" name="tag" maxlength="6" placeholder="{ 6 Characters }" class="form-control">
				        		</div>
				        	</div>
				        	<div class="row mt-4">
				        		<div class="col-md-8">
				        			<label>Event Poster</label>
				        			<div class="custom-file">
									  <input type="file" class="custom-file-input" name="poster" id="customFile">
									  <label class="custom-file-label" for="customFile">Choose event poster, use 1:1 ratio</label>
									</div>
				        		</div>
				        		<div class="col-md-4">
				        			<label>Category</label>
				        			<select class="form-control" name="category">
								      <option value="Webinar">Webinar</option>
								      <option value="Concert">Concert</option>
								      <option value="Theater">Theater</option>
								    </select>
				        		</div>
				        	</div>
				        	<button type="submit" class="btn btn-success my-4">Add Event</button>
				        </form>
				      </div>
				    </div>
				  </div>
				  <!-- <div class="card">
				    <div class="card-header" id="headingTwo">
				      <h2 class="mb-0">
				        <button class="btn btn-primary btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				          Active Event
				        </button>
				      </h2>
				    </div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				      <div class="card-body">
				        Some placeholder content for the second accordion panel. This panel is hidden by default.
				      </div>
				    </div>
				  </div> -->
				  <!-- <div class="card">
				    <div class="card-header" id="headingThree">
				      <h2 class="mb-0">
				        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          Collapsible Group Item #3
				        </button>
				      </h2>
				    </div>
				    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
				      <div class="card-body">
				        And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
				      </div>
				    </div>
				  </div> -->
				</div>
			</div>


		
		</div>



	</div>
</div>