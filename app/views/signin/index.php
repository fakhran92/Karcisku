<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="<?=ROOTURL?>">
    <img src="<?php echo ROOTURL ?>/public/assets/img/tickets.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Karcisku
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>


<!-- Main Content -->
<div class="container mt-3">
  <div class="col-md-6 offset-md-3">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-ticket-alt fa-fw"></i> Sign In to Karcisku
      </div>
      <div class="card-body">
        <?=$data['alert']?>
        <form action="<?=ROOTURL?>/signin/validate" method="POST">
          <div class="form-group">
            <label for="Username">Username</label>
            <input name="username" autofocus autocomplete="off" type="text" class="form-control" id="Username" placeholder="Input Your Username">
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input name="password" type="password" class="form-control" id="Password" placeholder="Input Your Password">
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
        </form>
      </div>
      <div class="card-footer">
        <small>Need an account? <a href="<?=ROOTURL?>/signup">Create</a> one now!</small>
      </div>
    </div>
  </div>
</div>