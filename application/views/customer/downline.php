<div class="main-content">
     <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <div class="row">
                         <div class="col-xs-12 col-md-12 col-lg-12">
                            <h4><?php echo $smallTitle;?></h4>
                            </div>
                            <div class="col-xs-6 col-md-6 col-lg-6">
                          
                            </div>
                            </div>

                        </div>
                        <div class="card-body">

                        <div class="col-xs-12 col-md-12 col-lg-12">
                         <div class="row">
                              <?php if(($tabv==6)||($tabv==2)){ 
                              ?>  <div class="col-xs-12 col-md-12 col-lg-12"><?php }else{?>
                         <div class="col-xs-6 col-md-6 col-lg-6">
                             <?php }?>
                            <div class="card-content table-full-width">
                                <h4 class="leftdownline"><?php if($tabv==6){echo "Downline List tree";}else {if($tabv==2){echo "Downline List of Gold";}else{echo "Downline List (Direct) Left";}}?></h4>
                                <table class="table table-bordered table-hover table-responsive text-nowrap">
                                <thead>
                                    <?php if($tabv==6){?>
                                        <tr >
                                      
                                        <th>User name[id]</th>
                                        <th>Sponsor[id]</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                  <?php   }else{
                                    ?>
                                    <tr class="table-primary">
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>Name</th>
                                    
                                       
                                        <!-- <th>Position</th> -->
                                        <th>Status</th>
                                        <th>Activate Date</th>
                                    </tr>
                                    <?php }?>
                                </thead>
                                    <tbody>
                                    <?php
                                        
                                       $i=1;
                                       if($tabv==1){ 
                                        foreach ($left->result() as $dtt) 
                                        {
                                            $this->db->where('id',$dtt->left);
                                           $dat= $this->db->get('customer_info')->row();
                                        ?>                                  
                                      
                                        <tr>
                                        <td><?php echo $i;?></td>
                                            <td><?php echo  $dat->username; ?></td>
                                            <td><?php echo  $dat->customer_name; ?></td>
                                           
                                          
                                            <!-- <td><?php //echo  $dat->c_id; ?></td> -->
                                            <td><?php if($dat->status==1) { echo "<label style='color:green'>ACTIVE</label>"; } else { echo "<label style='color:red'>NOT ACTIVE</label>"; }  ; ?></td>
                                            <td><?php echo  $dat->active_date; ?></td>
                                            <!-- <td></td> -->
                                        </tr>
                                        <?php $i++; }}
                                        else{
                                           if(($tabv==6)||($tabv==2)){
                                                if($tabv==6){
                                               $count="L";
                                           $count1="R";
                                            $this->db->where("c_id",$cid);
                                           $getright =  $this->db->get("silver_tree");
                                            $this->db->where("id", $cid);
                                                 $data1 = $this->db->get("customer_info");
                                                 
                                             $this->db->where("id", $getright->row()->left);
                                                 $data2 = $this->db->get("customer_info");    
                                                 //code for right
                                                 $this->db->where("id", $cid);
                                                 $data5 = $this->db->get("customer_info");
                                                
                                                  $this->db->where("id", $getright->row()->right);
                                                 $data6 = $this->db->get("customer_info");  
                                                 
                                            if($getright->num_rows()>0){
                                               
                                                if($data1->num_rows()>0){
                                                	$data1=$data1->row();
                                                	$data2=$data2->row();
                                                  if($data2->status==1){ $status= "Active";}else{$status="Inactive";}
                                                	echo 	"<tr>
						
								 <td>". $data2->customer_name. "[".$data2->username."]"."</td>
								  <td>".$data1->customer_name."[".$data1->username."]</td>
								   <td>".$count."</td>
								 <td>". $status. "</td>
								  <td>". $data2->active_date."</td>
								
							</tr>
							";
                                                	$this->tree->getRightData($getright->row()->left,$count);
                                                	 
                                            }if($data5->num_rows()>0){
                                            	$data5=$data5->row();
                                            	$data6=$data6->row();
                                              if($data2->status==1){ $status= "Active";}else{$status="Inactive";}
                                                	echo 	"<tr>
						
								 <td>". $data6->customer_name. "[".$data6->username."]"."</td>
								   <td>".$data5->customer_name."[".$data5->username."]</td>
								   <td>".$count1."</td>
								 <td>". $status. "</td>
								  <td>". $data6->active_date."</td>
								
							</tr>
							";
                                            
                                            	$this->tree->getLeftData($getright->row()->right,$count1);
                                            }}
                                            
                                              
                                               
                                               
                                               
                                           }
                                           //
                                            if($tabv==2){
                                               $count="L";
                                           $count1="R";
                                            $this->db->where("c_id",$cid);
                                           $getright =  $this->db->get("gold_tree");
                                            $this->db->where("id", $cid);
                                                 $data1 = $this->db->get("customer_info");
                                                 
                                             $this->db->where("id", $getright->row()->left);
                                                 $data2 = $this->db->get("customer_info");    
                                                 //code for right
                                                 $this->db->where("id", $cid);
                                                 $data5 = $this->db->get("customer_info");
                                                
                                                  $this->db->where("id", $getright->row()->right);
                                                 $data6 = $this->db->get("customer_info");  
                                                 
                                            if($getright->num_rows()>0){
                                               
                                                if($data1->num_rows()>0){
                                                	$data1=$data1->row();
                                                	$data2=$data2->row();
                                                  if($data2->status==1){ $status= "Active";}else{$status="Inactive";}
                                                	echo 	"<tr>
						
								 <td>". $data2->customer_name. "[".$data2->username."]"."</td>
								  <td>".$data1->customer_name."[".$data1->username."]</td>
								   <td>".$count."</td>
								 <td>". $status. "</td>
								  <td>". $data2->active_date."</td>
								
							</tr>
							";
                                                	$this->tree->getRightDatag($getright->row()->left,$count);
                                                	 
                                            }if($data5->num_rows()>0){
                                            	$data5=$data5->row();
                                            	$data6=$data6->row();
                                              if($data2->status==1){ $status= "Active";}else{$status="Inactive";}
                                                	echo 	"<tr>
						
								 <td>". $data6->customer_name. "[".$data6->username."]"."</td>
								   <td>".$data5->customer_name."[".$data5->username."]</td>
								   <td>".$count1."</td>
								 <td>". $status. "</td>
								  <td>". $data6->active_date."</td>
								
							</tr>
							";
                                            
                                            	$this->tree->getLeftDatag($getright->row()->right,$count1);
                                            }}
                                            
                                              
                                               
                                               
                                               
                                           }
                                           //    
                                           }
                                            else{
                                        	if($leftrootid){
                                        	$this->db->where('id',$leftrootid);
                                        	$dat= $this->db->get('customer_info')->row();
                                        	
                                        	
                                        ?>
                                        	
                                        	<tr>
                                        	<td><?php echo $i;?></td>
                                        	  <td><?php echo  $dat->username; ?></td>
                                        	   <td><?php echo  $dat->customer_name; ?></td>
                                        	 
                                        	      <!-- <td><?php //echo  $dat->c_id; ?></td> -->
                                        	      <td><?php if($dat->status==1) { echo "<label style='color:green'>ACTIVE</label>"; } else { echo "<label style='color:red'>NOT ACTIVE</label>"; }  ; ?></td>
                                        	       <td><?php echo  $dat->active_date; ?></td>
                                        	        <!-- <td></td> -->
                                        	        </tr>
                                        	                                        
                                       <?php $r=0; foreach ($left as $dtt): 
                                        
                                            $this->db->where('id',$dtt[$r]);
                                           $dat= $this->db->get('customer_info')->row();
                                        ?><tr>
                                        	<td><?php echo $r+2;?></td>
                                        	  <td><?php echo  $dat->username; ?></td>
                                        	   <td><?php echo  $dat->customer_name; ?></td>
                                        	   
                                        	      <!-- <td><?php //echo  $dat->c_id; ?></td> -->
                                        	      <td><?php if($dat->status==1) { echo "<label style='color:green'>ACTIVE</label>"; } else { echo "<label style='color:red'>NOT ACTIVE</label>"; }  ; ?></td>
                                        	       <td><?php echo  $dat->active_date; ?></td>
                                        	        <!-- <td></td> -->
                                        	        </tr>
                                        	  <?php $r++;endforeach;}}}?>         
                                        </tbody>
                                </table>
                            </div>
                        </div>
                       
                          <div class="col-xs-6 col-md-6 col-lg-6">
                       
                            <div class="card-content table-full-width">
                                <h4 class="leftdownline"><?php if(($tabv==6)||($tabv==2)){ }else {echo "Downline List (Direct) Right";}?> </h4>
                                <table class="table table-bordered table-hover table-responsive text-nowrap">
                                <thead>
                                   <?php if(($tabv==6)||($tabv==2)){?>
                                  
                                   <?php }else{?>
                                     <tr class="table-primary">
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>Name</th>
                                      
                                        <!-- <th>Position</th> -->
                                        <th>Status</th>
                                        <th>Activate Date</th>
                                    </tr>
                                   
                                <?php }   ?>
                                </thead>
                                    <tbody>
                                    <?php
                                        
                                    if($tabv==1){
                                        $i=1;
                                        foreach ($right->result() as $dtt) 
                                        {
                                            $this->db->where('id',$dtt->right);
                                           $dat= $this->db->get('customer_info')->row();
                                        ?>                                  
                                      
                                        <tr>
                                        <td><?php echo $i;?></td>
                                            <td><?php echo  $dat->username; ?></td>
                                            <td><?php echo  $dat->customer_name; ?></td>
                                    
                                            <!-- <td><?php //echo  $dat->c_id; ?></td> -->
                                            <td><?php if($dat->status==1) { echo "<label style='color:green'>ACTIVE</label>"; } else { echo "<label style='color:red'>NOT ACTIVE</label>"; }  ; ?></td>
                                            <td><?php echo  $dat->active_date; ?></td>
                                            <!-- <td></td> -->
                                        </tr>
                                        <?php $i++; }
                                        }else{
                                            if(($tabv==6)||($tabv==2)){
                                                if($tabv==6){
                                               $count=0;
                                           $count1=0;
                                            $this->db->where("c_id",$cid);
                                           $getright =  $this->db->get("silver_tree");
                                           
                                            	//$this->tree->getRightData($getright->row()->c_id,$count,$count1);
                                            
                                            }
                                                //
                                                 if($tabv==2){
                                                     
                                                 }
                                                //
                                            }else{
                                        	if($rightrootid){
                                        	$this->db->where('id',$rightrootid);
                                        	$dat= $this->db->get('customer_info')->row();
                                        	
                                        	
                                        ?>
                                        	
                                        	<tr>
                                        	<td><?php echo $i;?></td>
                                        	  <td><?php echo  $dat->username; ?></td>
                                        	   <td><?php echo  $dat->customer_name; ?></td>
                                        	   
                                        	      <!-- <td><?php //echo  $dat->c_id; ?></td> -->
                                        	      <td><?php if($dat->status==1) { echo "<label style='color:green'>ACTIVE</label>"; } else { echo "<label style='color:red'>NOT ACTIVE</label>"; }  ; ?></td>
                                        	       <td><?php echo  $dat->active_date; ?></td>
                                        	        <!-- <td></td> -->
                                        	        </tr>
                                        	                                        
                                       <?php $i=0; foreach ($right as $dtt): 
                                        
                                            $this->db->where('id',$dtt[0]);
                                           $dat= $this->db->get('customer_info')->row();
                                        ?><tr>
                                        	<td><?php echo $i+2;?></td>
                                        	  <td><?php echo  $dat->username; ?></td>
                                        	   <td><?php echo  $dat->customer_name; ?></td>
                                        	  
                                        	      <!-- <td><?php //echo  $dat->c_id; ?></td> -->
                                        	      <td><?php if($dat->status==1) { echo "<label style='color:green'>ACTIVE</label>"; } else { echo "<label style='color:red'>NOT ACTIVE</label>"; }  ; ?></td>
                                        	       <td><?php echo  $dat->active_date; ?></td>
                                        	        <!-- <td></td> -->
                                        	        </tr>
                                        	  <?php $i++; endforeach;}}}?> 
                                        </tbody>
                                </table>
                            </div>
                        
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>