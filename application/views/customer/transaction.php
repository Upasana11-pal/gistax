


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
                            <th>Customer ID</th>
                           
                          
                             <th>Amount</th>
                         
                            <th>Pair</th>
                           
                            <th>Level</th>
                           
                            <th>Type</th>
                            <th>Invoice No</th>
                            <th>Date</th>
                           
                          </tr>
                        </thead>
                        <tbody>

                        <?php 
                        
                        if($gdetails->num_rows()>0){
                          $i=1;$cspair=0;
                        foreach($gdetails->result() as $data):
                         $id= $data->paid_to;
                  
                  
                        ?>
                          <tr>
                            <td><?php echo $i;?></td>
                            <td class="align-middle"><?php  echo $custnm->customer_name ."[".$custnm->username ."]"; ?></td>
                            
                            <td><?php echo $data->amount; ?></td>
                           
                            <td> <?php 
                                  ?></td>
                            <td> <?php 
                             $total=$onetype +$fivetype;
                                 echo $total;
                            ?> 
                           </td>
                           
                            <td><?php ?></td>
                            <td><?php  echo $ttypeh; ?></td>
                            <td><?php echo $data->invoice_no;?></td>
                            <td><?php echo $data->date1;?></td>
                           
                          </tr>
                          
                          <?php //} 
                          $i++; endforeach; ?>
                        </tbody>
                   
                        <?php 
                         } else{
                            echo "data not found";
                          }
                        ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </section>
            </div>