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
                    <?php 
                    $cid=$this->session->userdata("customer_id");
						 $this->db->where("id",$cid);
						 $custdt=$this->db->get("customer_info");
						 if($custdt->num_rows()>0){
						     $data=$custdt->row();
                    ?>
                    <div class="table-responsive">
                        <table>
                            
                                	<tr>
														<td style="border: none;" align="center" colspan="8">
															<div class="customerHead"><?php  ?>
																<?php 
																 
																echo $data->customer_name."[".$data->username."]"; ?> <br/>
																<?php
																	/**
																	 * Getting the tree data of root node.
																	 */
																	$root = $this->db->query("SELECT * FROM autopool_details WHERE c_id=".$cid." LIMIT 1;")->row();
																	$rootData = $this->db->query("SELECT * FROM customer_info WHERE id=".$data->id." LIMIT 1;")->row();
																	$rootImg = $data ? 'activated.png' : 'disabled.png';
																	$rootImg = $rootData->status == 1 ? $rootImg : 'deactivated.png';
																	
																?>
																<img src="<?= base_url(); ?>assets/images/tree/<?= $rootImg;?>" width="60"  />

																<span class="customerLeft">
																
																</span>
															</div>

														</td>
													</tr>
														<tr>
														<td style="border: none;" align="center" colspan="12">
															<img src="<?= base_url(); ?>assets/images/tree/hr.png" width="95%" style="margin-top: -30px;">
														</td>
													</tr>
															<tr>
														<td style="border: none;"  colspan="4">
															<div style="margin-top: -20px;">
																<?php
																	$leftRootImg = $root->left ? 'activated.png' : 'disabled.png';
																	$customerID = $root->left ? $root->left : '';
																	$leftRootData = null;
																	$leftRootTree = null;
																	
																	if($root->left):
																		$leftRootData = $this->db->query("SELECT * FROM customer_info WHERE id=".$root->left." LIMIT 1;")->row();
																		$leftRootTree = $this->db->query("SELECT * FROM autopool_details WHERE c_id=".$root->left." LIMIT 1;")->row();
																		$leftRootImg = $leftRootData && $leftRootData->status == 1 ? $leftRootImg : 'deactivated.png';
																		if($leftRootData)
																			echo '<span>' . $leftRootData->customer_name . '<br> ('.$leftRootData->username.')</span>';
																	endif;
																?>
															</div>
															<div class="customerHead"><a href="#">
															<a href="#">
															<img src="<?= base_url(); ?>assets/images/tree/<?= $leftRootImg; ?>" data-id="<?= $customerID ?>" class="profileImg" width="60" >
																</a>
																<?php if($root->left && $leftRootData): ?>
																	<span class="customerLeft">
																		<?php //echo generateCustomerInfo($root->left, $leftRootData) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														
														<td style="border: none;"  colspan="4">
															<div style="margin-top: -20px;">
																<?php
																	$rightRootImg = $root->right ? 'activated.png' : 'disabled.png';
																	$customerID = $root->right ? $root->right : '';
																	$rightRootData = null;
																		$midRootTree = null;
																	if($root->right):
																		$rightRootData = $this->db->query("SELECT * FROM customer_info WHERE id=".$root->mid." LIMIT 1;")->row();
																		$midRootTree = $this->db->query("SELECT * FROM autopool_details WHERE c_id=".$root->mid." LIMIT 1;")->row();
																		$rightRootImg = $rightRootData && $rightRootData->status == 1 ? $rightRootImg : 'deactivated.png';
																		if($rightRootData)
																			echo '<span>' . $rightRootData->customer_name . '<br> ('.$rightRootData->username.')</span>';
																	endif;
																?>
															</div>
															
															<div class="customerHead"><a href="#">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $rightRootImg; ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">																		
                                                                   </a>
																<?php if($root->right && $rightRootData): ?>
																	<span class="customerRight">
																		<?php //echo generateCustomerInfo($root->right, $rightRootData) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														
														
														<td style="border: none;"  colspan="4">
															<div style="margin-top: -20px;">
																<?php
																	$rightRootImg = $root->right ? 'activated.png' : 'disabled.png';
																	$customerID = $root->right ? $root->right : '';
																	$rightRootData = null;
																		$rightRootTree = null;
																	if($root->right):
																		$rightRootData = $this->db->query("SELECT * FROM customer_info WHERE id=".$root->right." LIMIT 1;")->row();
																		$rightRootTree = $this->db->query("SELECT * FROM autopool_details WHERE c_id=".$root->right." LIMIT 1;")->row();
																		$rightRootImg = $rightRootData && $rightRootData->status == 1 ? $rightRootImg : 'deactivated.png';
																		if($rightRootData)
																			echo '<span>' . $rightRootData->customer_name . '<br> ('.$rightRootData->username.')</span>';
																	endif;
																?>
															</div>
															
															<div class="customerHead"><a href="#">
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
													
													
														<tr>
														<td style="border: none;" align="center" colspan="3">
															<img src="<?= base_url(); ?>assets/images/tree/hr1.png" width="55%" style="margin-top: -30px;">
														</td>
														<td style="border: none;" align="center" colspan="3">
															<img src="<?= base_url(); ?>assets/images/tree/hr1.png" width="55%" style="margin-top: -30px;">
														</td>
														<td style="border: none;" align="center" colspan="3">
															<img src="<?= base_url(); ?>assets/images/tree/hr1.png" width="55%" style="margin-top: -30px;">
														</td>
													</tr>
													<tr>
														<!-- Left Root Data -->
														<td style="border: none;" align="center" colspan="1">
															<div style="margin-top: -20px;">
																<?php
																	$leftRootImg = 'disabled.png';
																	$leftRootData1 = null;
																	$leftRootTree1 = null;
																	$customerID = '';
																	if($root->left && $leftRootTree && $leftRootTree->left):
																		$leftRootImg = $leftRootTree->left ? 'activated.png' : 'disabled.png';
																		$customerID = $leftRootTree->left ? $leftRootTree->left : '';
																		if($leftRootTree->left):
																			$leftRootData1 = $this->db->query("SELECT * FROM customer_info WHERE id=".$leftRootTree->left." LIMIT 1;")->row();
																			$leftRootTree1 = $this->db->query("SELECT * FROM autopool_details WHERE c_id=".$leftRootTree->left." LIMIT 1;")->row();
																			$leftRootImg = $leftRootData1 && $leftRootData1->status == 1 ? $leftRootImg : 'deactivated.png';
																			if($leftRootData1)
																				echo '<span>' . $leftRootData1->customer_name . '<br> ('.$leftRootData1->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead"><a href="#">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $leftRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																</a><?php if($root->left && $leftRootTree && $leftRootTree->left && $leftRootData1): ?>
																	<span class="customerLeft">
																		<?php //echo generateCustomerInfo($root->right, $rightRootData) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														
															<td style="border: none;" align="center" colspan="1">
															<div style="margin-top: -20px;">
																<?php
																	$rightRootImg = 'disabled.png';
																	$rightRootData1 = null;
																	$rightRootTree1 = null;
																	$customerID = '';
																	if($root->left && $leftRootTree && $leftRootTree->right):
																		$rightRootImg = $leftRootTree->right ? 'activated.png' : 'disabled.png';
																		$customerID = $leftRootTree->right ? $leftRootTree->right : '';
																		if($leftRootTree->right):
																			$rightRootData1 = $this->db->query("SELECT * FROM customer_info WHERE id=".$leftRootTree->mid." LIMIT 1;")->row();
																			$rightRootTree1 = $this->db->query("SELECT * FROM autopool_details WHERE c_id=".$leftRootTree->mid." LIMIT 1;")->row();
																			$rightRootImg = $rightRootData1 && $rightRootData1->status == 1 ? $rightRootImg : 'deactivated.png';
																			if($rightRootData1)
																				echo '<span>' . $rightRootData1->customer_name . '<br> ('.$rightRootData1->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
														
															<div class="customerHead"><a href="#">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $rightRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																</a><?php if($root->left && $leftRootTree && $leftRootTree->right && $rightRootData1): ?>
																	<span class="customerLeft">
																		<?php //echo generateCustomerInfo($leftRootTree->right, $rightRootData1) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														
														<td style="border: none;" align="center" colspan="1">
															<div style="margin-top: -20px;">
																<?php
																	$rightRootImg = 'disabled.png';
																	$rightRootData1 = null;
																	$rightRootTree1 = null;
																	$customerID = '';
																	if($root->left && $leftRootTree && $leftRootTree->right):
																		$rightRootImg = $leftRootTree->right ? 'activated.png' : 'disabled.png';
																		$customerID = $leftRootTree->right ? $leftRootTree->right : '';
																		if($leftRootTree->right):
																			$rightRootData1 = $this->db->query("SELECT * FROM customer_info WHERE id=".$leftRootTree->right." LIMIT 1;")->row();
																			$rightRootTree1 = $this->db->query("SELECT * FROM autopool_details WHERE c_id=".$leftRootTree->right." LIMIT 1;")->row();
																			$rightRootImg = $rightRootData1 && $rightRootData1->status == 1 ? $rightRootImg : 'deactivated.png';
																			if($rightRootData1)
																				echo '<span>' . $rightRootData1->customer_name . '<br> ('.$rightRootData1->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
														
															<div class="customerHead"><a href="#">
																<img src="<?= base_url(); ?>assets/images/tree/<?= $rightRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																</a><?php if($root->left && $leftRootTree && $leftRootTree->right && $rightRootData1): ?>
																	<span class="customerLeft">
																		<?php //echo generateCustomerInfo($leftRootTree->right, $rightRootData1) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														
														
																<!-- Right Root Data -->
														<td style="border: none;" align="center" colspan="1">
															<div style="margin-top: -20px;">
																<?php
																	$leftRootImg = 'disabled.png';
																	$leftRootData2 = null;
																	$leftRootTree2 = null;
																	$customerID = '';
																	if($root->right && $midRootTree && $midRootTree->left):
																		$leftRootImg = $midRootTree->left ? 'activated.png' : 'disabled.png';
																		$customerID = $midRootTree->left ? $midRootTree->left : '';
																		if($midRootTree->left):
																			$leftRootData2 = $this->db->query("SELECT * FROM customer_info WHERE id=".$midRootTree->left." LIMIT 1;")->row();
																			$leftRootTree2 = $this->db->query("SELECT * FROM autopool_details WHERE c_id=".$midRootTree->left." LIMIT 1;")->row();
																			$leftRootImg = $leftRootData2 && $leftRootData2->status == 1 ? $leftRootImg : 'deactivated.png';
																			if($leftRootData2)
																				echo '<span>' . $leftRootData2->customer_name . '<br> ('.$leftRootData2->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead"><a href="#">
															</a>	<img src="<?= base_url(); ?>assets/images/tree/<?= $leftRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->right && $midRootTree && $midRootTree->left && $leftRootData2): ?>
																	<span class="customerRight">
																		<?php //echo generateCustomerInfo($rightRootTree->left, $leftRootData2) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														
														
														
															<td style="border: none;" align="center" colspan="1">
															<div style="margin-top: -20px;">
																<?php
																	$rightRootImg = 'disabled.png';
																	$rightRootData2 = null;
																	$rightRootTree2 = null;
																	$customerID = '';
																	if($root->right && $midRootTree && $midRootTree->right):
																		$rightRootImg = $midRootTree->right ? 'activated.png' : 'disabled.png';
																		$customerID = $midRootTree->right ? $midRootTree->right : '';
																		if($midRootTree->right):
																			$rightRootData2 = $this->db->query("SELECT * FROM customer_info WHERE id=".$midRootTree->mid." LIMIT 1;")->row();
																			$rightRootTree2 = $this->db->query("SELECT * FROM autopool_details WHERE c_id=".$midRootTree->mid." LIMIT 1;")->row();
																			$rightRootImg = $rightRootData2 && $rightRootData2->status == 1 ? $rightRootImg : 'deactivated.png';
																			if($rightRootData2)
																				echo '<span>' . $rightRootData2->customer_name . '<br> ('.$rightRootData2->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead"><a href="#">
															</a>	<img src="<?= base_url(); ?>assets/images/tree/<?= $rightRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->right && $midRootTree && $midRootTree->left && $rightRootData2): ?>
																	<span class="customerRight">
																		<?php //echo generateCustomerInfo($rightRootTree->right, $rightRootData2) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														
														
														<td style="border: none;" align="center" colspan="1">
															<div style="margin-top: -20px;">
																<?php
																	$rightRootImg = 'disabled.png';
																	$rightRootData2 = null;
																	$rightRootTree2 = null;
																	$customerID = '';
																	if($root->right && $midRootTree && $midRootTree->right):
																		$rightRootImg = $midRootTree->right ? 'activated.png' : 'disabled.png';
																		$customerID = $midRootTree->right ? $midRootTree->right : '';
																		if($midRootTree->right):
																			$rightRootData2 = $this->db->query("SELECT * FROM customer_info WHERE id=".$midRootTree->right." LIMIT 1;")->row();
																			$rightRootTree2 = $this->db->query("SELECT * FROM autopool_details WHERE c_id=".$midRootTree->right." LIMIT 1;")->row();
																			$rightRootImg = $rightRootData2 && $rightRootData2->status == 1 ? $rightRootImg : 'deactivated.png';
																			if($rightRootData2)
																				echo '<span>' . $rightRootData2->customer_name . '<br> ('.$rightRootData2->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead"><a href="#">
															</a>	<img src="<?= base_url(); ?>assets/images/tree/<?= $rightRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->right && $midRootTree && $midRootTree->left && $rightRootData2): ?>
																	<span class="customerRight">
																		<?php //echo generateCustomerInfo($rightRootTree->right, $rightRootData2) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														
														
														
														<!-- Right Root Data -->
														<td style="border: none;" align="center" colspan="1">
															<div style="margin-top: -20px;">
																<?php
																	$leftRootImg = 'disabled.png';
																	$leftRootData2 = null;
																	$leftRootTree2 = null;
																	$customerID = '';
																	if($root->right && $rightRootTree && $rightRootTree->left):
																		$leftRootImg = $rightRootTree->left ? 'activated.png' : 'disabled.png';
																		$customerID = $rightRootTree->left ? $rightRootTree->left : '';
																		if($rightRootTree->left):
																			$leftRootData2 = $this->db->query("SELECT * FROM customer_info WHERE id=".$rightRootTree->left." LIMIT 1;")->row();
																			$leftRootTree2 = $this->db->query("SELECT * FROM autopool_details WHERE c_id=".$rightRootTree->left." LIMIT 1;")->row();
																			$leftRootImg = $leftRootData2 && $leftRootData2->status == 1 ? $leftRootImg : 'deactivated.png';
																			if($leftRootData2)
																				echo '<span>' . $leftRootData2->customer_name . '<br> ('.$leftRootData2->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead"><a href="#">
															</a>	<img src="<?= base_url(); ?>assets/images/tree/<?= $leftRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->right && $leftRootTree && $leftRootTree->left && $leftRootData2): ?>
																	<span class="customerRight">
																		<?php //echo generateCustomerInfo($rightRootTree->left, $leftRootData2) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														
														
														
														<td style="border: none;" align="center" colspan="1">
															<div style="margin-top: -20px;">
																<?php
																	$rightRootImg = 'disabled.png';
																	$rightRootData2 = null;
																	$rightRootTree2 = null;
																	$customerID = '';
																	if($root->right && $rightRootTree && $rightRootTree->right):
																		$rightRootImg = $rightRootTree->right ? 'activated.png' : 'disabled.png';
																		$customerID = $rightRootTree->right ? $rightRootTree->right : '';
																		if($rightRootTree->right):
																			$rightRootData2 = $this->db->query("SELECT * FROM customer_info WHERE id=".$rightRootTree->mid." LIMIT 1;")->row();
																			$rightRootTree2 = $this->db->query("SELECT * FROM autopool_details WHERE c_id=".$rightRootTree->mid." LIMIT 1;")->row();
																			$rightRootImg = $rightRootData2 && $rightRootData2->status == 1 ? $rightRootImg : 'deactivated.png';
																			if($rightRootData2)
																				echo '<span>' . $rightRootData2->customer_name . '<br> ('.$rightRootData2->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead"><a href="#">
															</a>	<img src="<?= base_url(); ?>assets/images/tree/<?= $rightRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->right && $rightRootTree && $rightRootTree->left && $rightRootData2): ?>
																	<span class="customerRight">
																		<?php //echo generateCustomerInfo($rightRootTree->right, $rightRootData2) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
														
														
														<td style="border: none;" align="center" colspan="1">
															<div style="margin-top: -20px;">
																<?php
																	$rightRootImg = 'disabled.png';
																	$rightRootData2 = null;
																	$rightRootTree2 = null;
																	$customerID = '';
																	if($root->right && $rightRootTree && $rightRootTree->right):
																		$rightRootImg = $rightRootTree->right ? 'activated.png' : 'disabled.png';
																		$customerID = $rightRootTree->right ? $rightRootTree->right : '';
																		if($rightRootTree->right):
																			$rightRootData2 = $this->db->query("SELECT * FROM customer_info WHERE id=".$rightRootTree->right." LIMIT 1;")->row();
																			$rightRootTree2 = $this->db->query("SELECT * FROM autopool_details WHERE c_id=".$rightRootTree->right." LIMIT 1;")->row();
																			$rightRootImg = $rightRootData2 && $rightRootData2->status == 1 ? $rightRootImg : 'deactivated.png';
																			if($rightRootData2)
																				echo '<span>' . $rightRootData2->customer_name . '<br> ('.$rightRootData2->username.')</span>';
																		endif;
																	endif;
																?>
															</div>
															<div class="customerHead"><a href="#">
															</a>	<img src="<?= base_url(); ?>assets/images/tree/<?= $rightRootImg ?>" data-id="<?= $customerID ?>" class="profileImg" width="60">
																<?php if($root->right && $rightRootTree && $rightRootTree->left && $rightRootData2): ?>
																	<span class="customerRight">
																		<?php //echo generateCustomerInfo($rightRootTree->right, $rightRootData2) ?>
																	</span>
																<?php endif; ?>
															</div>
														</td>
													</tr>
													
													
                           
                        </table>
           
               </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>    
            </div>
                   