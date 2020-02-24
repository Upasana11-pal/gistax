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
                    <table class="table table-striped" id="table-2">
                     
                     <thead>
                       <tr>
                         <th class="text-center"> #</th>
                         <th>Username/Name</th>
                         <th>Mobile</th>
                         <th>Amount</th>
                           <th>Invoice Number</th>
                         <th>Date</th>
                         
                       
                       </tr>
                     </thead>
                     <tbody>
                     <?php $j=1;
                     
                    $cid=$this->session->userdata("customer_id");
                    $this->load->model("cmodel");
                    $cdata=$this->cmodel->getCrecord($cid);
                    if($cdata->num_rows()>0){
                    	$this->db->where("transaction_type",12);
                	$this->db->where("paid_to",$cdata->row()->id);
                  	$pidate = $this->db->get("inner_daybook");
                  	if($pidate->num_rows()>0){
                  
                  	
                    foreach($pidate->result() as $data):
                  	
                     ?>
                       <tr>
                         <td><?php echo $j;?></td>
                         <td class="align-middle"><?php echo  $cdata->row()->username.'['.$cdata->row()->customer_name.']';?></td>
                         <td><?php echo $cdata->row()->mobilenumber;?></td>
                         <td><?php echo $data->amount;?></td>
                         <td><?php echo $data->invoice_no;?>
                           
                         <td><?php echo $data->date; ?></td>
                       
                       </tr>
                      <?php  $j++ ; endforeach; } }else{ echo "Customer Not Found." ; } ?>
                    
                      
                     </tbody>
                     
                   </table>
               </div>
                  </div>
                </div>
              </div>
            </div>    
            </div>
            </section>
            </div>
            
                   