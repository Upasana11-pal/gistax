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
                         
                         <th>Date</th>
                         <th>NOP</th>
                         <th>Status</th>
                         <th>Used Date</th>
                       	<th>Activate ID</th>
                       </tr>
                     </thead>
                     <tbody>
                     <?php $j=1;
                      if($pind->num_rows()>0){
                    foreach($pind->result() as $data):
                    $ct =$this->cmodel->getCrecord($cid)->row();
                  	$this->db->where("id",$data->id);
                  	$pidate = $this->db->get("mpin_master")->row();
                     ?>
                       <tr>
                         <td><?php echo $j;?></td>
                         
                         <td><?php echo $pidate->date;?></td>
                         <td><?php echo $data->mpin;?>
                            <input type="hidden" id="nop<?php echo $j;?>" value = "<?php echo $data->mpin;?>"></td></td>
                         <td><?php if($data->status){ echo "used" ;}else{echo "Unused";}?></td>
                         <td><?php if($data->status){ echo $data->active_mpin_date;}else{}?></td>
                         <td><?php if($data->status){ echo $data->id_active;}else{
                         	?><button id ="btn<?php echo $j;?>" class="btn btn-primary">Use PIN</button><?php ?>
                        <?php if($ct->status){?><input type="text" id ="activeid<?php echo $j;?>" name ="activateid"> <?php }else{ if($j<2){?>
                        
                        <input type="text" id ="activeid<?php echo $j;?>" name ="activateid" value="<?php echo $ct->username;?>" readonly="readonly">
                        
                        <?php }}}?>
                        </td>
                       
                       </tr>
                     <script>
                     $("#btn<?php echo $j;?>").click(function(){
                         var idforact = $("#activeid<?php echo $j;?>").val();
                         var mpin = $("#nop<?php echo $j;?>").val();
                         $.ajax({
                                   
                                    "url": "<?php echo site_url('pin/activateCustomer') ?>",
                                     "method": 'POST',
                                     "data": {idforact : idforact, mpin :mpin},
                                     beforeSend: function(data) {
                                        $("#activeid<?php echo $j;?>").val("<center><img src='<?php echo base_url(); ?>assets/img/loading.gif' /></center>")
                                     },
                                     success: function(data) {
                                         $("#activeid<?php echo $j;?>").val(data);
                                     },
                                     error: function(data) {
                                         $("#activeid<?php echo $j;?>").val(data);
                                     }
                                 })

                     });
                     </script>
                    <?php $j++ ; endforeach; }?>   
                     </tbody>
                     
                   </table>
               </div>
                  </div>
                </div>
              </div>
            </div>     
                   