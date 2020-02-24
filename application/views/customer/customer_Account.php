<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Customer KYC Form</h4>

						</div>
						<form method="post"
							action="<?php echo base_url()?>index.php/clogin/insertAccountD">
							<div class="card-body">
								<div class="alert alert-info">Note : - Please fill Sponsor Id
									for open registration form.Fill all the details and submit to
									save info.</div>

								<?php 
								if($this->session->userdata("customer_id")){
								$cid = $this->session->userdata("customer_id");
								$this->db->where("id",$cid);
								$crecord = $this->db->get("customer_info")->row();?>

								<div class="row" id="regForm">
									
	<input type="hidden" class="form-control" name="cid" id="cid"   value ="<?php echo $crecord->id;?>">
													
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-3">
														<label>Bank Name<span title="Required"
															style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="text" class="form-control" name="bname" id="fname" required="required" <?php if($crecord->bankname){echo 'readonly="readonly" value ="'.$crecord->bankname.'"';}?>>
														</div>
					                    <?php echo form_error('bname');?> 
					                   </div>
												</div>


											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3 ">
														<label>IFSCode<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
														<input type="text" class="form-control" name="ifsccode"	id="ifsccode" required="required" <?php if($crecord->ifsccode){echo 'readonly="readonly" value ="'.$crecord->ifsccode.'"';}?> >
															
														</div>
                                 <?= form_error('ifsccode'); ?>

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
														<label> Branch Name<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="text" class="form-control" name="branchname"
																id="branchname" 
																required="required" <?php if($crecord->branchname){echo 'readonly="readonly" value ="'.$crecord->branchname.'"';}?> >
														</div>
													</div> 
					                    <?= form_error('branchname'); ?>
					               </div>


											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Account No.<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="text" class="form-control" name="accountno" id="accountno" required="required" <?php if($crecord->account_no){echo 'readonly="readonly" value ="'.$crecord->account_no.'"';}?>>
														</div>
 								<?= form_error('accountno'); ?>
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
															<input type="text" class="form-control phone-number"
																
																maxlenght="12" minlenght="12" name="aadhar" id="aadhar"
																required="required" <?php if($crecord->adhaarnumber){echo 'readonly="readonly" value ="'.$crecord->adhaarnumber.'"';}?>>
														</div> 
                              			  <?= form_error('aadhar'); ?> 
					               </div>

												</div>
											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Pan No</label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="text" class="form-control phone-number"
																name="panno" id="panno" required="required" <?php if($crecord->pannumber){echo 'readonly="readonly" value ="'.$crecord->pannumber.'"';}?>>
														</div>
                                <?= form_error('panno'); ?> 
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
														<label>Nominee Name<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="text" class="form-control phone-number"
																
																maxlenght="12" minlenght="12" name="nomname" id="aadhar"
																required="required" <?php if($crecord->nom_name){echo 'readonly="readonly" value ="'.$crecord->adhaarnumber.'"';}?>>
														</div> 
                              			  <?= form_error('nomname'); ?> 
					               </div>

												</div>
											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Nominee RElation</label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="text" class="form-control phone-number"
																name="nomrel" id="panno" required="required" <?php if($crecord->nom_rel){echo 'readonly="readonly" value ="'.$crecord->pannumber.'"';}?>>
														</div>
                                <?= form_error('nomrel'); ?> 
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
														<label>Date Of Birth<span title="Required"
															style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="date" class="form-control datemask"
																name="dob" id="dob" required="required" <?php if($crecord->dob){echo 'readonly="readonly" value ="'.date('Y-m-d',strtotime($crecord->dob)).'"';}?>>
														</div> 
                               			  <?= form_error('dob'); ?> 
					               </div>

												</div>
											</div>
											
										</div>
									</div>


									

									<div class="col-md-12 col-lg-12 col-xs-12">
									<div class ="alert alert-danger">Please check above details. After submit there is no chance to Edit it.</div>
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3"></div>
													<div class="col-md-9">
														<div class="form-group mb-0">
															<div class="form-check">
																<input class="form-check-input" type="checkbox"
																	id="gridCheck" required="required" name="gridCheck"> <label
																	class="form-check-label" for="gridCheck"> <a href="#">i
																		Accept Term And Condition.</a>
																</label>
															</div>
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
								<?php }?>
							</div>
					
					</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
