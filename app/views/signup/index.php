<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="<?=ROOTURL?>">
    <img src="<?php echo ROOTURL ?>/public/assets/img/tickets.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Karcisku
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
  </div>
</nav>


<!-- Main Content -->
<div class="container mt-3">
  <div class="col-md-6 offset-md-3">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-user-plus fa-fw"></i> Register for an account
      </div>
      <div class="card-body">
      	<?=$data['alert']?>
        <form action="<?=ROOTURL?>/signup/processRegistration" method="POST">
          <div class="form-group">
            <label for="FullName">Full Name</label>
            <input name="fullname" autofocus autocomplete="off" type="text" class="form-control" id="FullName" placeholder="Input Your Full Name">
          </div>
          <div class="form-group">
            <label for="NoKTP">Identity Card Number</label>
            <input name="idcard" autocomplete="off" type="number" pattern="[0-9]{16}" class="form-control" id="NoKTP" placeholder="Input Your National ID Card Number">
          </div>
           <div class="row">
	          <div class="form-group col-md-6">
	            <label for="Email">Email</label>
	            <input name="email" autocomplete="off" type="email" class="form-control" id="Email" placeholder="Input Your Email">
	          </div>
	          <div class="form-group col-md-6">
	            <label for="Phone Number">Phone Number</label>
	            <input name="phone" type="tel" class="form-control" id="phone" placeholder="Input Your Phone Number" required>
	          </div>
          </div>
          <div class="row">
	          <div class="form-group col-md-6">
	            <label for="Username">Username</label>
	            <input name="username" autocomplete="off" type="text" class="form-control" id="Username" placeholder="Input Your Username">
	          </div>
	          <div class="form-group col-md-6">
	            <label for="Password">Password</label>
	            <input name="password" type="password" class="form-control" id="Password" placeholder="Input Your Password">
	          </div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
        </form>
      </div>
      <div class="card-footer">
        <small>Already have one? <a href="<?=ROOTURL?>/signin">Sign In</a> instead</small>
      </div>
    </div>
  </div>
</div>