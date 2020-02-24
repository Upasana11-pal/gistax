<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?php ?></h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                     
                        <thead>
                          <tr>
                          <th>S.NO.</th>
                            <th>CUSTOMER ID</th>
                            <th>CUSTOMER NAME </th>
                            <th>COMPLAINS</th>
                            <th>STATUS</th>


                           
                          </tr>
                        </thead>
                        <tbody>
                        <?php if($rty->num_rows()>0){
                          foreach($rty->result() as $row):
                              	?>
                        <tr>
                        <td><?php echo $row->s_no;?></td> 
                         <td><?php echo $row->id;?><input type ="hidden" name ="cid<?php echo $row->s_no; ?>" id ="cid<?php echo $row->s_no; ?>" value="<?php echo $row->s_no;?>" ></td>                                     
                        <td><?php echo $row->name; ?></td>
                         <td><?php echo $row->complain; ?></td>
                         <td><?php echo $row->status; 
                         if($row->status==0){?>
                        
                         <button type="button" class="btn btn-danger" value="<?php echo $row->status; ?>" id="b<?php echo $row->s_no; ?>">Pending</button>
                        <?php }
                        
                         else{?>
                         <button type="button" class="btn btn-success">Solve</button>
                        <?php }?>
                         </td>
                          
                          </tr>
                            <script>
                           
                            $("#b<?php echo $row->s_no; ?>").click(function(){
					var status = $("#b<?php echo $row->s_no; ?>").val();
					var cid = $("#cid<?php echo $row->s_no; ?>").val();
					alert(cid);
					$.post("<?php echo base_url();?>index.php/login/changecomStatus",{status : status, cid : cid}, function(data){
						$("#b<?php echo $row->s_no;?>").html(data);
						});
                            });
                            </script>
                       <?php endforeach; } ?>
                          
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
