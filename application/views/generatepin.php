<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Generate MPin</h4>
                  </div>
                  <div class="card-body">
                  <?php if($cust_data->num_rows()>0){ 
                    $row=$cust_data->row();
                    
                    ?>
                    <div class="row">
                    <div class="col-md-4">
                    <div class="section-title">Username</div>
                    <input type="hidden" class="form-control" style="width:100px;" id="cid"  value="<?php echo $row->id;?>">
                  <input type="text" class="form-control" style="width:100px;"  value="<?php echo $row->username;?>">
                  </div>
                  <div class="col-md-4">
                  <div class="section-title">NOP</div>
                  <input type="number" class="form-control" id="nop" style="width:80px;" name="nop" >
                  </div>
                  <div class="col-md-4">
                  <div class="section-title">Payment Recieve</div>

                <?php if($paydt->num_rows()>0){?><button class="badge badge-success badge-shadow"><?php echo $paydt->row()->status; ?></button><?php } else{ ?><button class="badge badge-danger badge-shadow"><?php echo "Not Approve";?></button> <?php }?></button>
                  </div>
                  </div>
                    <div style="margin-top:50px;" class="table-responsive" id="tblmpin">
                

                    </div>
                    <?php  //} 
                        //  $i++; endforeach; }else{
                       //   echo "data not found";
                       // }
                         }?>
                         
                  </div>
                </div>
              </div>
            </div>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                          <script>
                         
                            
                            $('#nop').keyup(function(){
                             var nop= $('#nop').val();
                             var id= $('#cid').val();
                            alert(nop);
                             $.post("<?php echo base_url();?>index.php/adminController/mpin" , 
                             { nop: nop , id : id },
                             function(data){

                               $('#tblmpin').html(data);




                             });

                            });
                         
                          </script>
                          </div>