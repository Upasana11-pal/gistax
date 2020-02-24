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
                      <table class="table table-striped" id="table-1">
                     
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Customer Name</th>
                            <th>Father Name</th>
                            <th>Mobile Number</th>
                            <th>Email Id</th>
                            <th>Parent Id</th>
                            <th>Position</th>
                            <th>Current Address</th>
                            <th>City</th>
                            <th>Status</th>
                            <?php if($uriv==3){?>  <th>Transacton / Reffrence Id</th>
                            
                           <th>Generate Pin</th>
                           <?php } ?>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if($row->num_rows()>0){
                          $i=1;
                        foreach($row->result() as $data):
                           $this->db->where("id",$data->parent_id);
                           $pdt=$this->db->get("customer_info");
                            
                          // if($paydt->num_rows()>0){
                        ?>
                          <tr>
                            <td><?php echo $i;?></td>
                            <td class="align-middle"><a href="<?php echo base_url();?>index.php/clogin/customer_profile/<?php echo $data->id;?>"><?php echo $data->customer_name;?></a></td>
                            <td><?php echo $data->fname;?></td>
                            <td><?php echo $data->mobilenumber;?></td>
                            <td><?php echo $data->email;?></td>
                            <td><?php if($pdt->num_rows()>0){ echo $pdt->row()->username; } else{ echo "N/A";}?></td>
                            <td><?php 
                            if($pdt->num_rows()>0){
                            $this->db->where("c_id",$pdt->row()->id);
                            $stree=$this->db->get("silver_tree");
                            if($stree->num_rows()>0){
                           if($stree->row()->left==$data->id){
                               echo "Left";
                           }
                           else{
                               echo "Right";
                           }
                            } }?></td>
                            <td><?php echo $data->current_address;?></td>
                            <td><?php echo $data->city;?></td>
                            <td> <div class="badge badge-success badge-shadow"><?php if($data->status==1){ echo "Active";}else{ "Inactive";}?></div></td>
                          <?php if($uriv==3){?>
                           <td><?php if($data->reffno){ echo $data->reffno;} else { if($data->transaction){ echo $data->transaction; }} ?> 
                             <a href="<?php echo base_url();?>assets/img/pay/<?php echo $data->uploadfile;?>"> 
                             <img alt="image" src="<?php echo base_url();?>assets/img/pay/<?php echo $data->uploadfile;?>" width="35"></a>
                            <?php  ?>
                            
                            <input type="hidden" id="<?php echo $i;?>id" value="<?php echo $data->id; ?>" ></td>
                           
                            <td><a href="<?php echo base_url();?>index.php/pin/generatePin/<?php echo $data->id; ?>" class="btn btn-primary"> Generate Pin</a></td>
                         
                         <?php } ?>
                          </tr>
                           <script>
                           $('#<?php echo $i;?>approve').hide();
                            $('#<?php echo $i;?>status').keyup(function(){
                             var st= $('#<?php echo $i;?>status').val();
                            // 
                             if((st.length)>0){
                              $('#<?php echo $i;?>approve').show(); 
                             }
                             else{
                              $('#<?php echo $i;?>approve').hide(); 
                             }

                             $('#<?php echo $i;?>approve').click(function(){
                               var stats =$('#<?php echo $i;?>status').val();
                               var id =$('#<?php echo $i;?>id').val();
                              $.post("<?php echo base_url()?>index.php/adminController/approve_paystatus" ,
                               { stats : stats , id : id } ,
                                function(data){
                                  // alert(data);
                                  $('#<?php echo $i;?>approve').html(data); 


                              });
                            });


                            });
                           
                         </script>
                          <?php //} 
                          $i++; endforeach; }else{
                          echo "data not found";
                        } ?>
                          
                        </tbody>
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
