<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Customer Registeration Print Slip Area</h4>

						</div>
							
							<div class="card-body">
								<div class="alert alert-info">Note : - Now you can print confirmation Slip by click print button.</div>
							<?php if($crecord->num_rows()>0){
							$c_ro=$crecord->row();
							?>
								<div class="row" id="regForm">

									<div class=" col-col-md-6 col-xs-6 col-lg-6 ">


										<div class="form-group row">
											<label class="col-sm-3 col-form-label required">Sponsor
												Userid</span>
											</label>
											<div class="col-sm-9">
										<?php $joiner = $this->cmodel->getCrecord($c_ro->joiner_id)->row();
										echo $joiner->customer_name."[".$joiner->username."]";
										?>
												
											</div>
										</div>
									</div>


									<div class=" col-col-md-6 col-xs-6 col-lg-6 ">
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">
											Parant Userid 
											</label>
											<div class="col-sm-9">
											<?php 	
											?>
                     						</div>
										</div>
									</div>
								

								
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Name</label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<?php echo $c_ro->customer_name;?>
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
															<?php echo $c_ro->fname;?>
														</div>
									
                                					</div>
												</div>


											</div>
										</div>
									</div>

									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-3">
														<label>Userid(Login id)</label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<?php echo $c_ro->username;?>
														</div>
					                   
					                   					</div>
												</div>


											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3 ">
														<label>Password </label>
													</div>
													<div class="col-md-9">
													<div class="form-group">
														<?php echo $c_ro->password;?>
                               						 </div>
                               						 </div>
												</div>

											</div>
										</div>
									</div>

									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label> Status<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<?php echo "Please Pay Activation Fee For Active your Account.";?>
														</div>
													</div> 
					                 
					               </div>


											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Date Of Birth</label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															
 														<?php echo $c_ro->dob;?>
                                					</div>
												</div>

											</div>
										</div>
									</div>
								</div>
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">

													<div class="col-md-3">
														<label> Address</label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<?php echo $c_ro->current_address;?>
														</div>
                           			
					               						</div>


												</div>
											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Mobile No<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<?php echo $c_ro->mobilenumber;?>
														</div>
                              
                                </div>
												</div>
											</div>

										</div>
									</div>
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Aadhar No<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<?php echo $c_ro->adhaarnumber;?>
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
															<button class ="btn btn-info">Print Receipt</button>
														</div> 
                              			
					               					</div>

												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
					<?php }?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
