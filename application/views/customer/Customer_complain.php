<!-- Main Content -->
      <div class="main-content">
       <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="form-group row">
			   <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
			        <div class="container">
				        <div class="row d-flex align-items-stretch no-gutters">
					        <div class="col-md-12 p-4 p-md-5 order-md-last bg-light">
					        	<form action="<?php echo base_url();?>index.php/clogin/customer_complain" method="post">
                                    <div class="form-group">
                                        <div class="form-group">
                                        <input type="text" name="id" class="form-control" value="<?php echo $this->session->userdata("customer_username");?>" readonly>
                                      </div>
                                        <input type="text" name="name" class="form-control" value="<?php echo $this->session->userdata("name");?>" readonly>
                                      </div>
                                      
                                      <div class="form-group">
                                        <textarea name="complain" id="" cols="30" rows="7" class="form-control" placeholder="complains"></textarea>
                                      </div>
                                      <div class="form-group">
                                        <input type="submit" value="OK" class="btn btn-primary py-3 px-5">
                                      </div>
                                    </form>
					</div>
				</div>
			</section>
                </div>
                	</div>
				</div>
				<div class="col-sm-3"></div>
                </div>
                
                
                  </div>
                 </section>
                  </div>
                
                
                 
                 
                 
      