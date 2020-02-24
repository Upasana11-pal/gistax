 <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="<?php echo base_url();?>assets/img/logo.png" class="header-logo" /> <span
                class="logo-name"><?php echo $mainPage;?></span>
            </a>
          </div>
          <div class="sidebar-user">
            <div class="sidebar-user-picture">
              <?php if(strlen($this->session->userdata('image'))>0){?>
              <img alt="image" src="<?php echo base_url();?>assets/img/users/<?php echo $this->session->userdata('image');?>"
              <?php }else {?>
              <img alt="image" src="<?php echo base_url();?>assets/img/default.jpg"
              
              <?php }?>
            </div>
            <div class="sidebar-user-details">
              <div class="user-name">
                  <?php echo $this->session->userdata("name");?>
                 [ <?php echo $this->session->userdata("customer_username");?>]</div>
              <div class="user-role"><?php if($this->session->userdata("login_type")==1){echo "Administrator";}else{echo "Customer";}?></div>
            </div>
          </div>
          <!-- admin Menu Start -->
          <?php if($this->session->userdata("login_type")==1){
         	 	$this->load->view("includes/adminMenu");
           }else{
          	if($this->session->userdata("login_type")==2){
          		$this->load->view("includes/customerMenu");
          	}
          }?>
        </aside>
      </div>