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
                            <th>Paid To </th>
                            <th>Amount</th>
                           <?php if($uri==1){ ?>
                            <th>Reason</th>
                            <?php }else{ ?>
                                <th>Discription</th> 
                         <?php  } ?>
                            <th>Invoice Number</th>
                            <?php if($uri==1){ ?>
                            <th>Debit/Credit</th>
                              <?php }else{ } ?>
                            <th>Date</th>
                           
                          </tr>
                        </thead>
                        <tbody>

                        <?php 
                        if($uri==1){
                        if($outdb->num_rows()>0){
                          $i=1;
                        foreach($outdb->result() as $data):
                         $id= $data->paid_from;
                        
                          $custnm= $this->cmodel->getCrecord($data->paid_from);
                          
                        ?>
                          <tr>
                            <td><?php echo $i;?></td>
                            <td class="align-middle"><?php if($custnm->num_rows()>0){ echo $custnm->row()->customer_name;} else{ echo "name not found";}?></td>
                            <td><?php if($data->paid_to==-1){echo "Admin";}else{echo $data->paid_to;}?></td>
                            <td><?php echo $data->amount;?></td>
                            <td><?php echo $data->reason;?></td>
                            <td><?php echo "UMPI".$data->invoice_no;?></td>
                        <td><?php if(($data->debit_credit)==1){ ?><button class="badge badge-success badge-shadow"><?php echo "Credit"; ?></button> <?php } else{ ?><button class="badge badge-danger badge-shadow"> <?php echo "Debit";?></button> <?php } ?></td>
                            <td><?php echo $data->date;?></td>
                           
                         
                         
                          </tr>
                          
                          <?php //} 
                          $i++; endforeach; } else{
                            echo "data not found";
                          }  } else{
                            if($inndb->num_rows()>0){
                              $i=1;
                            foreach($inndb->result() as $data):
                             $id= $data->paid_from;
                            
                              $custnm= $this->cmodel->getCrecord($data->paid_from);
                            ?>
                            <tr>
                            <td><?php echo $i;?></td>
                            <td class="align-middle"><?php if($custnm->num_rows()>0){ echo $custnm->row()->customer_name;} else{ echo "name not found";}?></td>
                            <td><?php if($data->paid_to==-1){echo "Admin";}else{echo $data->paid_to;}?></td>
                            <td><?php echo $data->amount;?></td>
                            <td><?php echo "N/A";?></td>
                            <td><?php echo "UMPI".$data->invoice_no;?></td>
                            <td><?php echo $data->date1;?></td>
                           
                         
                         
                          </tr>
                          
                            
                        <?php $i++; endforeach; } else{
                            echo "data not found";
                          }  }  ?>
                          
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
