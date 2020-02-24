<div class="main-content">
    <div class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><?php $camt=0; echo $smallTitle;?></h4>
                        </div>

                        <div class="card-body">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                           <div class="card-content table-full-width">
                                <h4 class="leftdownline">Downline List (In-Direct) Right</h4>
                               <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr class="table-primary">
                                        <th>Wallet</th>
                                        <th>Total Balance(Rupess/-)</th>
                                        <th>View Details</th>
                                       
                                    </tr>
                                </thead>
                                    <tbody>
                                    <tr>
                                     <td>Direct Income</td>
                                      
                                       <td><?php echo $sw->row()->amount; ?></td> 
                                       <td></td> 
                                    </tr>
                                    <tr>
                                     <td>Auto Pool Income</td>
                                      
                                       <td><?php echo $gw->row()->amount;?></td> 
                                       <td></td> 
                                    </tr>
                                     <tr>
                                      <td>Gold Club</td>
                                    
                                       <td><?php echo $dw->row()->amount; ?></td> 
                                         <td></td> 
                                    </tr>
                                    
                                    <tr>
                                      <td>Travel Club</td>
                                     
                                       <td><?php echo $cw->row()->amount; ?></td> 
                                        <td></td> 
                                     
                                    </tr>
                                     <tr>
                                      <td>Diamond club</td>
                                       
                                       <td><?php echo $auto->row()->pool_income; 
                                     ?></td>
                                     <td></td>
                                        
                                    </tr>
                                     <tr>
                                      <td>Ambassador club</td>
                                    
                                       <td><?php echo $auto->row()->pool_income; 
                                     ?></td>
                                       <td></td> 
                                        
                                    </tr>
                                     <tr>
                                      <td>House Club</td>
                                     
                                       <td><?php echo $auto->row()->pool_income; 
                                     ?></td>
                                      <td></td> 
                                        
                                    </tr>
                                     <tr>
                                      <td>Royalty Club</td>
                                      
                                       <td><?php echo $auto->row()->pool_income; 
                                     ?></td>
                                       <td></td>  
                                    </tr>
                                     <tr>
                                      <td>LIC Club</td>
                                   
                                       <td><?php echo $auto->row()->pool_income; 
                                     ?></td>
                                          <td></td>  
                                    </tr>
                                     <tr>
                                      <td>Withdrawal Success</td>
                                     
                                       <td><?php echo $auto->row()->pool_income; 
                                     ?></td>
                                        <td></td>  
                                    </tr>
                                     <tr>
                                      <td>Pin Craditor(Purchase)</td>
                                      
                                       <td><?php echo $auto->row()->pool_income; 
                                     ?></td>
                                        <td></td> 
                                    </tr>
                                    
                                    
                                    </tbody>
                                    <tfoot>
                                        
                                    <tr class="table-primary">
                                       
                                        <td>Total</td>
                                        <td>
                                            <?php 
                                            if($sw->num_rows()>0){
                                            $samt=$sw->row()->amount;
                                            }else{
                                            $samt=0;
                                            }
                                            
                                              if($gw->num_rows()>0){
                                            $gamt=$gw->row()->amount;
                                            }else{
                                            $gamt=0;
                                            }
                                            
                                            
                                            
                                              if($cw->num_rows()>0){
                                            $camt=$camt+$cw->row()->amount;
                                            }else{
                                          
                                            }
                                            echo $samt +$camt;
                                            ?>
                                            
                                        </td>
                                         <td></td>
                                    </tr>    
                                        
                                    </tfoot>
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