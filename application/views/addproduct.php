<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Add Product Form</h4>

						</div>
						<form method="post"	action="<?php echo base_url()?>index.php/adminController/insertproduct" enctype="multipart/Form-data" >
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										
											<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-3">
														<label>Product Name<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="text" class="form-control"
																value="" name="name"
																id="name" required="required">
														</div>
								
                                         </div>
												</div>


											</div>
												<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-3">
														<label>Choose Image<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="file" class="form-control"
																value="" name="img"
																id="name" required="required">
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
														<label>Product Price<span title="Required"
															style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="text" class="form-control"
																value="" name="price"
																id="fname" required="required">
														</div>
					                  
					                   </div>
												</div>


											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3"></div>
													<div class="col-md-9">
														<div class="form-group">
															<button type="submit" class="btn btn-primary"
																id="regisbtn">
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
					
					</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
