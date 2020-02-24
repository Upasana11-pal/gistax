<?php 
?>
<div id="row" style="background-color:; height:150px;"></div>
<div id="row" style="background-color: ; height:500px;">
<div class="col-sm-3" style="background-color: ; height:500px; float:left;"></div>
<div class="col-sm-8" style="background-color:; height:500px; float:left;">

    <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
			<div class="container">
				<div class="row d-flex align-items-stretch no-gutters">
					<div class="col-md-12 p-8 p-md-5 order-md-last bg-light">
						<form action="<?php echo base_url()?>index.php/welcome/contact_fill" method="post" >
                        <div class="row clearfix">
                               <div class="col-md-6">
                                    <div class="form-group">
                                       <select class="form-control show-tick" id="taxtype" name="taxtype" required="required">
                                        <option value=""><b>Select Tax Type</b></option>
                                        <option value="house">गृहकर + जलकर</option>
                                        <!--<option value="water">जलकर</option>-->
                                        <option value="jalmulya">जलमूल्य</option>

                                        </select>
                                    </div>
                                </div>
					 <div class="col-md-6">
                                    <div class="form-group">
                                       <select class="form-control show-tick" id="taxtype" name="taxtype" required="required">
                                        <option value=""><b>Select Ward</b></option>
                                        <option value="house">--------</option>
                                        <option value="water">----------</option>
                                        <option value="jalmulya">-------</option>

                                        </select>
                                    </div>
                                </div>
              <div class="col-md-12">
                                    <div class="form-group">
                                       <select class="form-control show-tick" id="taxtype" name="taxtype" required="required">
                                        <option value=""><b>Payment Year</b></option>
                                        <option value="house">--------</option>
                                        <option value="water">----------</option>
                                        <option value="jalmulya">-------</option>

                                        </select>
                                    </div>
                                </div>
             
              <div class="col-md-12">
                                    <div class="form-group">
                                       <select class="form-control show-tick" id="taxtype" name="taxtype" required="required">
                                        <option value=""><b>ID / Owner / (Father/Husband) /Address</b></option>
                                        <option value="house">--------</option>
                                       Total Paying Tax Amount <option value="water">----------</option>
                                        <option value="jalmulya">-------</option>

                                        </select>
                                    </div>
                                </div>
             
                <div class="col-md-12">
                                    <div class="form-group">
                                <input type="number" id="amount"  name ="amount" class="form-control" placeholder="Total Paying Tax Amount" min="0" required>
                                    
                                    </div>
                                </div>
               <div class="col-md-12">
                                    <div class="form-group">
                                <input type="number" id="penalty"  name ="penalty" class="form-control" placeholder="Total Rebate" min="0" required>
                                    
                                    
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                               <input type="text" id="mobile"  name ="mobile" class="form-control" placeholder="Enter Mobile Number" pattern="[6789]{1}[0-9]{9}" title="Mobile Number Must be Start with 6,7,8,9" maxlength="10" required>
                                    
                                    </div>
                                </div>
                               <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="pay_type" name="pay_type" required="required">
                                            <option value="">-Select Payment Type-</option>
                                            <option value="cash">Cash</option>
                                            <option value="cheque">Cheque</option>
                                            <option value="online">Online</option>
                                            
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                <input type="submit" value="Pay" class="btn btn-primary py-3 px-5">
              </div> 
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
            </form>
					</div>
					<div class="col-md-6 d-flex align-items-stretch">
            
				</div>
			</div>
		</section>

</div>
</div>
<div class="col-sm-1" style="background-color:; height:700px; float:left;"></div>
            </div>