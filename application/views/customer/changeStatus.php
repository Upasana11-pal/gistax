<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Customer Activation Panel</h4>

						</div>
							
							<div class="card-body">
								<div class="alert alert-info">Note : - Now Pay 299/- Rupees for activation ON bellow given Accoutn Details ditails.
								<br> Account Number	:  XXXXXXX
								<br> Account Name 	:  XXXXXXX
								<br> IFSC CODE		:  XXXXX
								<br> Account Address : XXXXX
								
								Note: After tranfer Amount please upload payment slip or fill transaction number below given box.
								 
								</div>
							<?php if($crecord->num_rows()>0){
							$c_ro=$crecord->row();
							?>
							
							<?php if($this->uri->segment(3)){
											getAlert($this->uri->segment(3));
							}?>
								
				<form method="post" action="<?php echo base_url()?>index.php/clogin/requestUpdate" enctype="multipart/form-data" >
								<div class="row" id="regForm">	
									<div class="col-md-12 col-lg-12 col-xs-12">
									
										<div class="row">
										
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Name</label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="text" name="name" class="form-control" value ="<?php echo $c_ro->customer_name;?>" readonly/>
														</div>
					                   			</div>
												</div>
											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-3">
														<label>Father Name<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															
															<input type="text" name="fname" class="form-control" value ="<?php echo $c_ro->fname;?>" readonly/>
														</div>
									
                                					</div>
												</div>


											</div>
										</div>
									

									
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-3">
														<label>Userid(Login id)</label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<?php //echo $c_ro->username;?>
															<input type="text" name="uname" class="form-control" value ="<?php echo $c_ro->username;?>" readonly/>
														</div>
					                   
					                   					</div>
												</div>


											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label> Status<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<?php echo "inactive.";?>
														</div>
													</div> 
					                 
					               					</div>			
					               				</div>
										</div>
									
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">

													<div class="col-md-3">
														<label> Transaction Number</label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
														<?php if($pd){
															$pd1=$pd->row();?>
															<input type="text" class="form-control" value ="<?php echo $pd1->transaction;?>" name="tno" id="tno" />
															
														<?php }else{
															?>	
															<input type="text" class="form-control" name="tno" id="tno" />
													<?php 	}?>
															
														</div>
														</div>
                           			
					               						</div>


												</div>
											
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Reference NO</label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="text" class="form-control" name="reffno" <?php if($pd){  echo 'value='.$pd1->reffno;}else{ }?>  id="reffno"/>
														</div>
                              
                                </div>
												</div>
											</div>

										</div>
								
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Upload Transfer Slip</label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
														<?php if($pd){?>
														<img src="<?php echo base_url();?>assets/img/pay/<?php echo $pd1->uploadfile;?>" alt="Smiley face" height="250" width="230">
															
															<?php }?>
															<input type="file" name = "photo" id ="paymentSlip" class="form-control">
															<!-- <input type="file" name="photo"/> -->
															
														</div> 
                              			
					               					</div>

												</div>
											</div>
											
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<button class ="btn btn-info">Update Status</button>
														</div> 
                              			
					               					</div>

												</div>
											</div>
											
										</div>
									</div>
									</form>
								</div>
							</div>
					<?php }?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
