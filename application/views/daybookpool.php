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
                 
                        <div class="row">
                            
                            <div class="col-md-6">
                                   <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                     
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Customer Name & ID</th>
                            <th>Level</th>
                            <th>Pool income</th>
                            <!--<th>Roi Income</th>-->
                            <th>Date</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                      $getp =   $this->db->get("autopool_details");
                        if($getp->num_rows()>0){
                          $i=1;
                        foreach($getp->result() as $data):
                           $this->db->where("id",$data->c_id);
                           $pdt=$this->db->get("customer_info")->row();
                            
                        ?>
                          <tr>
                              
                            <td><?php echo $i;?></td>
                            <td class="align-middle"><a href="<?php echo base_url();?>index.php/clogin/customer_profile/<?php echo $pdt->id;?>"><?php echo $pdt->customer_name;?></a></td>
                            <td><?php echo $data->level;?></td>
                            <td><?php echo $data->pool_income;?></td>
                            <!--<td><?php //echo $data->roi_income;?></td>-->
                            <td><?php echo $data->date;?></td>
                          
                           
                          </tr>
                          
                          <?php //} 
                          $i++; endforeach; }else{
                          echo "data not found";
                        } ?>
                          
                        </tbody>
                        
                      </table> 
                            </div>
                             </div>
                             <div class="col-md-6">
                                     <div class="table-responsive">
                                 <table class="table table-striped" id="table-1">
                     
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Customer Name & ID</th>
                         
                            <th>Roi income</th>
                          
                            <th>Date</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                      $getp =   $this->db->get("direct_income");
                        if($getp->num_rows()>0){
                          $i=1;
                        foreach($getp->result() as $data):
                           $this->db->where("id",$data->c_id);
                           $pdt=$this->db->get("customer_info")->row();
                            
                        ?>
                          <tr>
                              
                            <td><?php echo $i;?></td>
                            <td class="align-middle"><a href="<?php echo base_url();?>index.php/clogin/customer_profile/<?php echo $pdt->id;?>"><?php echo $pdt->customer_name;?></a></td>
                            
                            <td><?php echo $data->amount;?></td>
                           
                            <td><?php echo $data->date;?></td>
                          
                           
                          </tr>
                          
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
              </div>
            </div>
