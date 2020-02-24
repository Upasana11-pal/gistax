			<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $smallTitle;?></h4>
                  </div>
                  <div class="card-body">
                    <?php if($this->session->userdata('login_type')==1){?>
                     <form method="post"
							action="<?php echo base_url()?>index.php/pin/genSavePin">
                     <div class="col-xs-12 col-md-12 col-lg-12">
                     	<div class="row">
                     	   
                     		<div class=" col-col-md-3 col-xs-3 col-lg-3 ">
                     		     <?php if($this->uri->segment("4")=="success"){
                     	    getAlert("success");}?>
                     			 <?php 
                     			
                     			 if($id){?>
                     			Username& Name : <?php 
                     			$ct =$this->cmodel->getCrecord($id)->row();
                     			echo $ct->username.'['.$ct->customer_name.']';
                     		
                     			?>
                     			<input type="hidden" name ="cid" value ="<?php echo $id;?>">
                     			<?php }else{?>
                     			<div class="form-group row">
													<div class="col-md-5">	Username: 
													</div>
													<div class="col-md-6">
														<div class="form-group">
                     				<input type="text" name ="uid" class="form-control">
                     		</div>
                     		</div>
                     		</div>
                     			
                     		<?php } ?></div>
                     		<div class=" col-col-md-3 col-xs-3 col-lg-3 ">
                     		<div class="form-group row">
													<div class="col-md-5">	PIN: 
													</div>
													<div class="col-md-6">
														<div class="form-group">
                     										<select class="custom-select" id="nopin"
																name="nopin" required="required">
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
																<option value="6">6</option>
																<option value="7">7</option>
																<option value="8">8</option>
																<option value="9">9</option>
																<option value="10">10</option>
																</select>
                     		</div>
                     		</div>
                     		</div>
                     		</div>
                     		<div class=" col-col-md-3 col-xs-3 col-lg-3 ">
                     			<div class="form-group row">
													<div class="col-md-5">Paid Amount: 
													</div>
								<div class="col-md-6">
									<div class="form-group">					
                     			<input type="text" name="pingenVale" class="form-control">
                     		</div>
                     		</div>
                     		</div>
                     		</div>
                     		<div class=" col-col-md-3 col-xs-3 col-lg-3 ">
                     		<div class="form-group row">
													<div class="col-md-3">
													</div>
											<div class="col-md-9">
									<div class="form-group">					
                     			<button type ="submit" class = "btn btn-success"><i class ="far fa-edit"></i>Generate</button>
                     		</div>		
                     			
                     		</div>
                     		</div>
                     	</div>
                     	</div>
                     </div>
                     </form>
                  <?php }?>
                    <div class="table-responsive">
                    <table class="table table-striped" id="table-2">
                     
                     <thead>
                       <tr>
                         <th class="text-center"> #</th>
                         <th>Username/Name</th>
                         
                         <th>Mobile</th>
                         <th>Date</th>
                         <th>NOP</th>
                         <th>Pin Status</th>
                        
                       	<th>Details</th>
                       	<th>Action</th>
                       	
                       </tr>
                     </thead>
                     <tbody>
                     <?php $j=1;
                      if(($checkv)||($checkv->num_rows()>0)){
                    foreach($checkv->result() as $data):
                    $ct =$this->cmodel->getCrecord($data->customer_id)->row();
                    $this->db->where("id",$data->id);
                    $dt=$this->db->get("mpin");
                    if($dt->num_rows()>0){
                    	$this->db->where("status",0);
                    	$this->db->where("id",$data->id);
                    	$unused = $this->db->get("mpin");
                    	$this->db->where("status",1);
                    	$this->db->where("id",$data->id);
                    	$used = $this->db->get("mpin");
                     ?>
                       <tr>
                         <td><?php echo $j;?></td>
                         <td class="align-middle"><?php echo  $ct->username.'['.$ct->customer_name.']';?></td>
                         <td><?php echo $ct->mobilenumber;?></td>
                         <td><?php echo $data->date;?></td>
                         <td><?php echo $data->nop;?> </td>
                         <?php 
                        
                         ?>
                         <td><?php  if($unused->num_rows()>0){echo $unused->num_rows()." Left, "; } if($used->num_rows()>0) { echo $used->num_rows()." Used ";}?></td>
                        
                        
                          <td><a href="<?php echo base_url();?>index.php/pin/pinDetails/<?php echo $data->id; ?>/<?php echo $data->customer_id; ?>" class="btn btn-primary"> View</a></td>
                           <td><a href="<?php echo base_url();?>index.php/pin/pinDelete/<?php echo $dt->row()->id; ?>/<?php echo $data->customer_id; ?>" class="btn btn-danger"> Delete</a></td>
                       </tr>
                     
                    <?php $j++ ; } endforeach;  }?>   
                     </tbody>
                     
                   </table>
               </div>
                  </div>
                </div>
              </div>
            </div> 
            </div>
                   