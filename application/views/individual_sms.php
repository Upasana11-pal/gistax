<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Send Individual SMS</h4>
						</div>
						<form  method="post" action="<?php echo base_url();?>index.php/sms/notice">
							<div class="card-body">
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
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
