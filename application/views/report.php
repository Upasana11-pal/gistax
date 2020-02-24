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
                               <div class="col-md-4">
                                    <div class="form-group">
                                       <select class="form-control show-tick" id="taxtype" name="taxtype" required="required">
                                        <option value=""><b>Report Type</b></option>
                                        <option value="house">गृहकर + जलकर</option>
                                        <!--<option value="water">जलकर</option>-->
                                        <option value="jalmulya">जलमूल्य</option>

                                        </select>
                                    </div>
                                </div>
                <div class="col-md-4">
                                    <div class="form-group">
                                       <select class="form-control show-tick" id="taxtype" name="taxtype" required="required">
                                        <option value=""><b>Select Year</b></option>
                                        <option value="house">--------</option>
                                        <option value="water">----------</option>
                                        <option value="jalmulya">-------</option>

                                        </select>
                                    </div>
                                </div>
             <div class="col-md-4">
                                    <div class="form-group">
                                       <select class="form-control show-tick" id="taxtype" name="taxtype" required="required">
                                        <option value=""><b>Tax Type</b></option>
                                        <option value="house">--------</option>
                                        <option value="water">----------</option>
                                        <option value="jalmulya">-------</option>

                                        </select>
                                    </div>
                                </div>       
                                       
              <div class="form-group">
              
                <input type="submit" value="Get Report" class="btn btn-primary py-7 px-8">
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