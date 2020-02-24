<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Genret mpin</h4>

						</div>
						<form method="post"
							action="<?php echo base_url()?>index.php/pin/generatePin1">
							<div class="card-body">
							

								<div class="row">

									<div class=" col-col-md-6 col-xs-6 col-lg-6 ">


										<div class="form-group row">
											<label class="col-sm-3 col-form-label required">Sponsor
												Userid<span title="Required" style="color: red;">*</span>
											</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="parent_id"
													id="parent_id"
													value="<?php echo set_value('parent_id'); ?>"
													required="required">
												<div class="invalid-feedback">Oh no! Email is invalid.</div>
											</div>
										</div>
									</div>


									<div class=" col-col-md-6 col-xs-6 col-lg-6 ">
										<div class="form-group row">
											<label class="col-sm-3 col-form-label"></label>
											<div class="col-sm-9">
												<div id="custoStatus"></div>
                     <?php echo validation_errors();?>
                     </div>
										</div>
									</div>
								</div>

								<div class="row" >
									

								

									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
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
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
