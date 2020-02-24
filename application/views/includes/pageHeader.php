<nav class="navbar navbar-expand-lg main-navbar">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="1">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
         <strong><?php echo $this->session->userdata("business_name");?></strong>
          <div>
                      
                   
         
                      <?php if($this->session->userdata("login_type")==2){
                      echo "       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;Total Wallet Amount".$totmb =$this->pay_details->totwallet($this->session->userdata("customer_id"));
                   ?> </div>
        </div><?php  $rc =   $this->cmodel->getCrecord($this->session->userdata("customer_id"))->row();
                    if(!$rc->status){
                    	?>
                    	 <a href="#" class="btn btn-danger">Inactive</a>
                    	
                    	   
                  <?php   }else{
                  	?>
                  	
                    	 <a href="#" class="btn btn-success">Active</a>
                    	
                    	    
                  	<?php 
                      }}else{?>
                      
                      </div>
                      </div>
                      <?php }?>
                
        </div>
        
        <ul class="navbar-nav navbar-right">
         
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 
              <?php if(strlen($this->session->userdata('image'))>0){?>
              <img alt="image" src="<?php echo base_url();?>assets/img/users/<?php echo $this->session->userdata('image');?>"
              <?php }else {?>
              <img alt="image" src="<?php echo base_url();?>assets/img/default.jpg"
              
              <?php }?>
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?php echo $this->session->userdata("name");?></div>
               <?php if($this->session->userdata("login_type")==1){ ?>
               <a href="<?php echo base_url();?>index.php/adminController/admin_profile" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <?php }else{ ?><a href="<?php echo base_url();?>index.php/clogin/customer_profile" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a><?php }?>
              <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url();?>index.php/welcome/logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>