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
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-tie fa-fw"></i>

          <?php 
          $role = $this->model('User_model')->getRole();
          $user = $this->model('User_model')->getUserDetailBySession($_SESSION['karcisku_user']);
          echo $user[0]['fullname']
           ?>
          
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=ROOTURL?>/logout"><i class="fas fa-sign-out-alt fa-fw"></i> &nbsp; Logout</a>
          <?php if ($role['role'] == 'user'): ?>
            <a class="dropdown-item" href="<?=ROOTURL?>/mytickets"><i class="fas fa-ticket-alt fa-fw"></i> &nbsp; My Tickets</a>
          <?php endif ?>
          <!-- <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a> -->
        </div>
      </li>
        <?php 
      
      if ($role['role'] == 'user') {?>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-stream fa-fw"></i>&nbsp;Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=ROOTURL?>/category/webinar"><i class="fas fa-chalkboard-teacher fa-fw"></i> &nbsp; Webinar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=ROOTURL?>/category/concert"><i class="fas fa-guitar fa-fw"></i> &nbsp; Concert</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=ROOTURL?>/category/theater"><i class="fas fa-theater-masks fa-fw"></i> &nbsp; Theater</a>
        </div>
      </li>

       <?php
      }
       ?>
     <!--  <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
    <?php if ($role['role'] == 'user') {?>
    <form class="form-inline my-2 my-lg-0" method="POST" action="<?=ROOTURL?>/search">
      <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <?php }?>
  </div>
</nav>