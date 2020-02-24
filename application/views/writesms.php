<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
						  <?php  if($uri==1){ ?>
							<h4>Send Individual SMS</h4>
							<?php } elseif($uri==2){ ?>
						<h4>	All Customer SMS</h4>
							<?php } else{ ?>
								<h4>Upgrading Wise SMS</h4>
							<?php } ?>
						</div>
						<form  method="post" action="<?php echo base_url();?>index.php/sms/send_sms/<?php echo $uri;?>">
							<div class="card-body">
							    <?php 
							    if($uri==1){  ?>
							    
							    
							    		<div class="row" >
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Enter Your Message<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															 <textarea name="msg" class="form-control text-uppercase" placeholder="Enter Text" id="textArea4" rows="1"></textarea>
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
														<label>Enter Mobile Number<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															 <input type="text" class="form-control validate" id=""  name="mobile" placeholder="Enter Mobile Number" required="" required>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Number of Character<span title="Required"
															style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="text" class="form-control validate" id="totalCharacter4" placeholder="Number Of Character" name="job" required="" required>
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
													<div class="col-md-12"></div>
												</div>
											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3"></div>
													<div class="col-md-9">
														<div class="form-group">
															<button type="submit" class="btn btn-primary"
																id="changePassword">
																<i class="far fa-edit">&nbsp;Submit</i>
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							    
							    
							    <?php }  elseif($uri==2){ ?>
							    
							    
							    	<div class="row" >
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Enter Your Message<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															 <textarea name="msg" class="form-control text-uppercase" placeholder="Enter Text" id="textArea4" rows="1"></textarea>
														</div>
													</div>
												</div>
											</div>
											
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Number of Character<span title="Required"
															style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="text" class="form-control validate" id="totalCharacter4" placeholder="Number Of Character" name="job" required="" required>
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
													<div class="col-md-12"></div>
												</div>
											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3"></div>
													<div class="col-md-9">
														<div class="form-group">
															<button type="submit" class="btn btn-primary"
																id="changePassword">
																<i class="far fa-edit">&nbsp;Submit</i>
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							    
							    
							    
							    <?php } else {?>
								<div class="row" >
								<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Select Club<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<select class="custom-select" id="selectTree" name="selectTree" required="" >
																<option selected="">--Select Club--</option>
																<option value="1">Silver</option>
																<option value="2">Gold</option>
																<option value="3">Diamond</option>
																<option value="4">Crown</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											
											<div class="col-xs-6 col-md-6 col-lg-6">
												
											</div>
										</div>
									</div>
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Enter Your Message<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															 <textarea name="msg" class="form-control text-uppercase" placeholder="Enter Text" id="textArea4" rows="1"></textarea>
														</div>
													</div>
												</div>
											</div>
											
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Number of Character<span title="Required"
															style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="text" class="form-control validate" id="totalCharacter4" placeholder="Number Of Character" name="job" required="" >
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
													<div class="col-md-12"></div>
												</div>
											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3"></div>
													<div class="col-md-9">
														<div class="form-group">
															<button type="submit" class="btn btn-primary"
																id="changePassword">
																<i class="far fa-edit">&nbsp;Submit</i>
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
