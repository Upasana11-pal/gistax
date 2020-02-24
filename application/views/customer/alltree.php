<div class="main-content">
    <div class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                             <div class="row">
                         <div class=" col-md-8">
                            <h4><?php echo $smallTitle;?></h4>
                            </div>
                            <div class=" col-md-4">
                            <a href="<?php echo base_url();?>index.php/clogin/alltree/" class="btn btn-info">All Downline</a>
                            </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                         <div class="row">
                         <div class="col-xs-6 col-md-6 col-lg-6">
                            <div class="card-content table-full-width">
                                <h4 class="leftdownline">Downline List (In-Direct) Left</h4>
                                <table class="table table-bordered table-hover table-responsive text-nowrap">
                                <thead>
                                    <tr class="table-primary">
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Joining Date</th>
                                        <th>Mobile</th>
                                        <!-- <th>Position</th> -->
                                        <th>Status</th>
                                        <th>Activate Date</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    <?php
                                        
                                       $i=1;
                                     
                                        foreach ($left->result() as $dtt) 
                                        {
                                            $this->db->where('id',$dtt->left);
                                           $dat= $this->db->get('customer_info')->row();
                                        ?>                                  
                                      
                                        <tr>
                                        <td><?php echo $i;?></td>
                                            <td><?php echo  $dat->username; ?></td>
                                            <td><?php echo  $dat->customer_name; ?></td>
                                            <td><?php echo  $dat->joining_date; ?></td>
                                            <td><?php echo  $dat->mobilenumber; ?></td>
                                            <!-- <td><?php //echo  $dat->c_id; ?></td> -->
                                            <td><?php if($dat->status==1) { echo "<label style='color:green'>ACTIVE</label>"; } else { echo "<label style='color:red'>NOT ACTIVE</label>"; }  ; ?></td>
                                            <td><?php echo  $dat->active_date; ?></td>
                                            <!-- <td></td> -->
                                        </tr>
                                        <?php $i++; }  
                                    ?>         
                                        </tbody>
                                </table>
                            </div>
                        </div>
                       
                          <div class="col-xs-6 col-md-6 col-lg-6">
                       
                            <div class="card-content table-full-width">
                                <h4 class="leftdownline">Downline List (In-Direct) Right</h4>
                                <table class="table table-bordered table-hover table-responsive text-nowrap">
                                <thead>
                                    <tr class="table-primary">
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Joining Date</th>
                                        <th>Mobile</th>
                                        <!-- <th>Position</th> -->
                                        <th>Status</th>
                                        <th>Activate Date</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    <?php
                                        
                              
                                        $i=1;
                                        foreach ($right->result() as $dtt):
                                        
                                            $this->db->where('id',$dtt->right);
                                           $dat= $this->db->get('customer_info')->row();
                                        ?>                                  
                                      
                                        <tr>
                                        <td><?php echo $i;?></td>
                                        <input type="hidden" id="custid<?php echo $i;?>" value="<?php echo $dat->id;?>" />
                                            <td><?php echo  $dat->username; ?> <button id="cid<?php echo $i;?>" >expend</button></td>
                                            <td><?php echo  $dat->customer_name; ?></td>
                                            <td><?php echo  $dat->joining_date; ?></td>
                                            <td><?php echo  $dat->mobilenumber; ?></td>
                                            <!-- <td><?php //echo  $dat->c_id; ?></td> -->
                                            <td><?php if($dat->status==1) { echo "<label style='color:green'>ACTIVE</label>"; } else { echo "<label style='color:red'>NOT ACTIVE</label>"; }  ; ?></td>
                                            <td><?php echo  $dat->active_date; ?></td>
                                            <!-- <td></td> -->
                                        </tr>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                                        <script>
                                            $(document).ready(function(){
                                                $('#cid<?php echo $i;?>').click(function(){
                                                 
                                                   var custid= $('#custid<?php echo $i;?>').val();
                                                   $.post("<?php echo base_url();?>index.php/clogin/getrecord" ,
                                                   { custid : custid } , function(data){
                                                       alert(data);
                                                       
                                                   });
                                                  
                                                    
                                                });
                                               
                                                
                                                
                                            });
                                        </script>
                                        
                                        <?php $i++;  endforeach;  ?> 
                                        </tbody>
                                </table>
                            </div>
                        
                        </div>
                        </div>
                        	<div class="table-responsive">
								<table width="100%">
													<tr>
														<td style="border: none;" align="center" colspan="8">
															<div class="customerHead"><?php  $data=$crecord->row();?>
																<?php  echo $data->customer_name."[".$data->username."]"; ?> <br/>
																<?php
																	/**
																	 * Getting the tree data of root node.
																	 */
																	$root = $this->db->query("SELECT * FROM silver_tree WHERE c_id=".$data->id." LIMIT 1;")->row();
																	$rootData = $this->db->query("SELECT * FROM customer_info WHERE id=".$data->id." LIMIT 1;")->row();
																	$rootImg = $data ? 'activated.png' : 'disabled.png';
																	$rootImg = $rootData->status == 1 ? $rootImg : 'deactivated.png';
																	
																?>
																<img src="<?= base_url(); ?>assets/images/tree/<?= $rootImg;?>" width="60"  />

																<span class="customerLeft">
																	<?php //echo generateCustomerInfo($data->id, $data) ?>
																</span>
															</div>

														</td>
													</tr>
													<tr>
														<td style="border: none;" align="center" colspan="8">
															<img src="<?= base_url(); ?>assets/images/tree/hr.png" width="55%" style="margin-top: -30px;">
														</td>
													</tr>
															<tr>
														<td style="border: none;" align="center" colspan="4">
															<div style="margin-top: -20px;">
																<?php
																	$leftRootImg = $root->left ? 'activated.png' : 'disabled.png';
																	$customerID = $root->left ? $root->left : '';
																	$leftRootData = null;
																	$leftRootTree = null;
																	
																	if($root->left):
																		$leftRootData = $this->db->query("SELECT * FROM customer_info WHERE id=".$root->left." LIMIT 1;")->row();
																		$leftRootTree = $this->db->query("SELECT * FROM silver_tree WHERE c_id=".$root->left." LIMIT 1;")->row();
																		$leftRootImg = $leftRootData && $leftRootData->status == 1 ? $leftRootImg : 'deactivated.png';
																		if($leftRootData)
																			echo '<span>' . $leftRootData->customer_name . '('.$leftRootData->username.')</span>';
																	endif;
																?>
															</div>
															<div class="customerHead">
															<a href="<?php echo base_url(); ?>index.php/clogin/alltree/<?php echo $customerID ?>/5">
															<img src="<?= base_url(); ?>assets/images/tree/<?= $leftRootImg; ?>" data-id="<?= $customerID ?>" class="profileImg" width="60" >
																</a>
																<?php if($root->left && $leftRootData): ?>
																	<span class="customerLeft">
																		<?php //echo generateCustomerInfo($root->left, $leftRootData) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														<td style="border: none;" align="center" colspan="4">
															<div style="margin-top: -20px;">
																<?php
																	$rightRootImg = $root->right ? 'activated.png' : 'disabled.png';
																	$customerID = $root->right ? $root->right : '';
																	$rightRootData = null;
																		$rightRootTree = null;
																	if($root->right):
																		$rightRootData = $this->db->query("SELECT * FROM customer_info WHERE id=".$root->right." LIMIT 1;")->row();
																		$rightRootTree = $this->db->query("SELECT * FROM silver_tree WHERE c_id=".$root->right." LIMIT 1;")->row();
																		$rightRootImg = $rightRootData && $rightRootData->status == 1 ? $rightRootImg : 'deactivated.png';
																		if($rightRootData)
																			echo '<span>' . $rightRootData->customer_name . '('.$rightRootData->username.')</span>';
																	endif;
																?>
															</div>
															
															<div class="customerHead"><a href="<?php echo base_url(); ?>index.php/clogin/alltree/<?php echo $customerID ?>/5">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $rightRootImg; ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">																		
</a>
																<?php if($root->right && $rightRootData): ?>
																	<span class="customerRight">
																		<?php //echo generateCustomerInfo($root->right, $rightRootData) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
													</tr>
													</table>
												</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>