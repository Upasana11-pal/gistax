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
                    <div class="table-responsive">
                       <table  class="display table table-striped text-nowrap" style="width: 100%; cellspacing: 0;" id="table-1">
                                        <thead>
                                            <tr style="font-size: 18px;font-family:Arial;background-color: pink;text-align:center;">
                                                   <th>S.N.</th>
                                                   <th>Customer username</th>
                                                   <th>Total Mpin</th>
                                                 
                                                   <th>Mbalance</th>
												    <td>Pay</td> 
                                            </tr>
                                        </thead>
                                        <tbody >
                                        	<?php $i = 1;$s1=0;$s2=0;$s3=0;$s4=0;$s5=0;$s6=0;?>

                                        	<?php $res = 	$this->db->query("SELECT SUM(nop) as totp,customer_id from mpin_master GROUP BY customer_id");
													?>
                                               
                                        	<?php 
                                        	if($res->num_rows()>0){
                                        	foreach($res->result() as $row):
                                        	 $this->db->where("id",$row->customer_id);
                                        	$custdt= $this->db->get("customer_info");
                                        	if($custdt->num_rows()>0){
                                        	    $custdt=$custdt->row();
                                        	
                                        	$s1=$s1+$row->totp;
                                        	?>
                                            <tr style="font-size: 16px;text-align:center;">
                                              
                                               
                                                <td><?php echo $i;?></td>
                                                
                                                <td>
												
												<input type="hidden" id ="cid<?php echo $i;?>" name ="cid" value="<?php echo $custdt->id;?>">
												<?php echo $custdt->username."[".$custdt->customer_name."]";?></td>
                                               <td><a class="btn btn-info" href="<?php echo base_url();?>index.php/pin/generatePin/<?php echo $custdt->id;?>"><?php echo $row->totp; ?></a></td>
                                               <?php  
                                              $totmb =$this->pay_details->totwallet($custdt->id);
                                             ?>
                                             <input type="hidden" id="amt<?php echo $i;?>" value="<?php echo $totmb; ?>">
                                               <td><?php echo $totmb; ?></td> 
                                              
                                                <td><input type="text" id ="pay<?php echo $i;?>" name ="pay" > <button id ="btn<?php echo $i;?>" class="btn btn-primary">Pay</button> </td> 
                                            </tr>
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
											<script>
                     $("#btn<?php echo $i;?>").click(function(){
                       //  alert("aarju");
                         var pay = Number($("#pay<?php echo $i;?>").val());
						 var cid = $("#cid<?php echo $i;?>").val();
						  var totv = Number($("#amt<?php echo $i;?>").val());
						//  alert(pay+cid+totv);
						  if((totv > pay)&&(pay > 0)){
						       $.post("<?php echo site_url('pin/pay') ?>",
						 {pay : pay, cid :cid, totv : totv},
						 function(data){
						     alert(data);
						     location.reload();
						
						});
						  }else{
						     alert("Please Enter a Valid Amount");  
						  }
                     });
						  
                     </script>
                                            <?php $i++; ?>
                                            <?php } endforeach;}?>
                                            
                                            
                                            
                                           
                                        </tbody>
                                        <tfoot>
                                         <tr style="font-size: 18px;font-family:Arial;background-color: pink;">
                                                   <th>Total</th>
                                                   <th></th>
                                                   <th class="text-center"><?php echo $s1?></th>
                                                   <th class="text-center"><?php echo $s2?></th>
                                                  
												   <th class="text-center"></th>
                                            </tr>
                                        
                                        </tfoot>
                                       </table>  
                    </div>
                  </div>
                </div>
              </div>
            </div>
