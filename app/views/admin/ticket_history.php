<div class="container mt-3">
	<table class="table">
	  <thead class="thead-light">
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col">Ticket - Id</th>
	      <th scope="col">Event - Id</th>
	      <th scope="col">Customer Name</th>
	      <th scope="col">Ticket Code</th>
	    </tr>
	  </thead>
	  <tbody>
<?php foreach ($data['tickets'] as $key => $ticket): ?>
	    <tr>
	      <th scope="row"><?=$key+=1?></th>
	      <td>Ticket - <?=$ticket['id']?></td>
	      <td>Event - <?=$ticket['event_id']?></td>
	      <td><?=$ticket['customer_name']?></td>
	      <td><?=$ticket['booking_code']?></td>
	    </tr>
<?php endforeach ?>
	  </tbody>
	</table>
	
</div>