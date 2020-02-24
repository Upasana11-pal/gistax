
     
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-green-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Direct Income</h4>
                    <span><?php 
                 $total=0;
                    $this->db->select_sum("amount");
                    $this->db->where("paid_to",$this->session->userdata("customer_id"));
                     $this->db->where("transaction_type",1);
                        $sbal=  $this->db->get("inner_daybook");
                    if($sbal->row()->amount>0){
                        echo $sbal->row()->amount;
                    }
                    else{
                        echo "0.00";
                    }
                   $this->db->where("c_id",$this->session->userdata("customer_id"));
                    
                    $dlevel= $this->db->get("silver_mbalance");
                    
                    $this->db->select_sum("leftt");
                    $this->db->where("level < ",$dlevel->row()->level+1);
                    $pair = $this->db->get("direct_income_master");
                    if($pair->num_rows()>0){
                        $totp = $pair->row()->leftt;
                    }else{
                        $totp=0;
                    }
                    ?></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i> </span>
                      <span class="text-nowrap">Pair =<?php echo $totp;?></span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-cyan-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Auto Pool Income</h4>
                    <span><?php 
                    $aul=0;
                     $cid=$this->session->userdata("customer_id");
                	$dr1= $this->db->query("select * from silver_tree where  silver_tree.rightjoiner='$cid'")->num_rows();
                 	$dl2=$this->db->query("select * from silver_tree where  silver_tree.leftjoiner='$cid' ")->num_rows();
                    $d11= $dr1+$dl2;
          
                        $this->db->select_sum("amount");
                        $this->db->where("paid_to",$this->session->userdata("customer_id"));
                        $this->db->where("transaction_type",2);
                        $getautopool = $this->db->get("inner_daybook");
                        if($getautopool->num_rows()>0){
                           $autopool = $getautopool->row()->amount; 
                        }else{
                            $autopool=0;
                        }
                        echo $autopool;
                             $this->db->where("c_id",$this->session->userdata("customer_id"));
                    $alevel=  $this->db->get("autopool_details");
                    if($alevel->num_rows()>0){
                        $aul=$alevel->row()->level;
                    }else{
                        $aul=0;
                    }
                     if($d11>2){
                        echo "[ In Autopool ]";
                        }
                    else{
                        
                         echo "[ Not in Autopool ]";
                    }
                    ?></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Level =<?php echo $aul;?></span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-purple-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Gold Club Income</h4>
                    <span><?php 
                   
                 if($d11>9){
                     $this->db->select_sum("amount");
                        $this->db->where("paid_to",$this->session->userdata("customer_id"));
                        $this->db->where("transaction_type",4);
                        $roi = $this->db->get("inner_daybook");
                        if($roi->num_rows()>0){
                            echo $roi->row()->amount;
                        }else{
                            echo "0.00";
                        }
                         echo "[ Gold Club Member ]";
                 }else{
                      echo "[ Not in Gold Club Member ]";
                 }
                $gcf =  $d11-3;
                    ?></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Direct ID =<?php  if($gcf >-1){echo $gcf;}else{ echo "0";}?></span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-orange-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-money-bill-alt"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Travel Club</h4>
                    <span><?php 
                    
                	if($d11>20){
                     $this->db->select_sum("amount");
                        $this->db->where("paid_to",$this->session->userdata("customer_id"));
                        $this->db->where("transaction_type",5);
                        $toi = $this->db->get("inner_daybook");
                        if($toi->num_rows()>0){
                            echo $toi->row()->amount;
                        }else{
                            echo "0.00";
                        }
                         echo "[ Travel Club Member ]";
                 }else{
                      echo "[ Not in Travel Club Member ]";
                 }
                 
                  $gcft =  $d11-10;
                  ?></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Direct ID =<?php  if($gcft >-1){echo $gcft;}else{ echo "0";}?></span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
             <div class="row ">
           
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-cyan-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                  <div class="card-content">
                    <h4 class="card-title"> Car Club </h4>
                    <span><?php
                    if($d11>34){
                        $this->db->select_sum("amount");
                        $this->db->where("paid_to",$this->session->userdata("customer_id"));
                        $this->db->where("transaction_type",6);
                        $coi = $this->db->get("inner_daybook");
                        if($coi->num_rows()>0){
                            echo $coi->row()->amount;
                        }else{
                            echo "0.00";
                       
                        
                        }
                         echo "[ Car Club Member ]";
                 }else{
                      echo "[ Not in Car Club Member ]";
                 }
                 
                  $gcftc =  $d11-25;
                    ?>
                    </span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Direct ID =<?php  if($gcftc >-1){echo $gcftc;}else{ echo "0";}?></span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-purple-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                  <div class="card-content">
                    <h4 class="card-title"> Diamond club </h4>
                    <span><?php
                        if($d11>55){
                        $this->db->select_sum("amount");
                        $this->db->where("paid_to",$this->session->userdata("customer_id"));
                        $this->db->where("transaction_type",7);
                        $doi = $this->db->get("inner_daybook");
                        if($doi->num_rows()>0){
                            echo $doi->row()->amount;
                        }else{
                            echo "0.00";
                       
                        
                        }
                         echo "[ Diamond Club Member ]";
                 }else{
                      echo "[ Not in Diamond Club Member ]";
                 }
                 
                  $gcftcd =  $d11-46;
                    ?> 
                    </span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Direct ID =<?php  if($gcftcd >-1){echo $gcftcd;}else{ echo "0";}?></span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-orange-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-money-bill-alt"></i></div>
                  <div class="card-content">
                    <h4 class="card-title"> Ambassador club  </h4>
                    <span> <?php
                        if($d11>85){
                        $this->db->select_sum("amount");
                        $this->db->where("paid_to",$this->session->userdata("customer_id"));
                        $this->db->where("transaction_type",8);
                        $aoi = $this->db->get("inner_daybook");
                        if($aoi->num_rows()>0){
                            echo $aoi->row()->amount;
                        }else{
                            echo "0.00";
                       
                        
                        }
                         echo "[ Ambassador Club Member ]";
                 }else{
                      echo "[ Not in Ambassador Club Member ]";
                 }
                 
                  $gcftcda =  $d11-76;
                    ?> 
                </span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Direct ID =<?php  if($gcftcda >-1){echo $gcftcda;}else{ echo "0";}?></span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
             <div class="col-xl-3 col-lg-6">
                 <div class="card l-bg-green-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">House Club</h4>
                    <span><?php
                        if($d11>130){
                        $this->db->select_sum("amount");
                        $this->db->where("paid_to",$this->session->userdata("customer_id"));
                        $this->db->where("transaction_type",9);
                        $hoi = $this->db->get("inner_daybook");
                        if($hoi->num_rows()>0){
                            echo $hoi->row()->amount;
                        }else{
                            echo "0.00";
                       
                        
                        }
                         echo "[ House  Club Member ]";
                 }else{
                      echo "[ Not in House  Club Member ]";
                 }
                 
                  $gcftcdah =  $d11-121;
                    ?> </span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i> </span>
                      <span class="text-nowrap">Direct ID =<?php  if($gcftcdah >-1){echo $gcftcdah;}else{ echo "0";}?></span>
                    </p>
                  </div>
                </div>
              </div>
                
              </div>
          </div>
         
      
            
              <div class="row ">
           
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-cyan-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                  <div class="card-content">
                    <h4 class="card-title"> Royalty Club </h4>
                    <span>  <?php
                        if($d11>205){
                        $this->db->select_sum("amount");
                        $this->db->where("paid_to",$this->session->userdata("customer_id"));
                        $this->db->where("transaction_type",10);
                        $roi1 = $this->db->get("inner_daybook");
                        if($roi1->num_rows()>0){
                            echo $roi1->row()->amount;
                        }else{
                            echo "0.00";
                       
                        
                        }
                         echo "[ Royalty  Club Member ]";
                 }else{
                      echo "[ Not in Royalty  Club Member ]";
                 }
                 
                  $gcftcdahr =  $d11-196;
                    ?>  </span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Direct ID =<?php  if($gcftcdahr >-1){echo $gcftcdahr;}else{ echo "0";}?></span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-purple-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                  <div class="card-content">
                    <h4 class="card-title"> LIC Club </h4>
                    <span> <?php
                    echo "[ Not in LIC Club Member ]";
                    ?></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Pair</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-orange-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-money-bill-alt"></i></div>
                  <div class="card-content">
                    <h4 class="card-title"> Withdrawal Success  </h4>
                    <span>  </span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Pair</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
             <div class="col-xl-3 col-lg-6">
                 <div class="card l-bg-green-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Pin Details</h4>
                    <span></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i> </span>
                      <span class="text-nowrap">Pair</span>
                    </p>
                  </div>
                </div>
              </div>
                
              </div>
          </div> 
             
            
            
          
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Total Wallet Amount</h4>
                </div>
                <div class="card-body">
                  <div id="echart_graph_line" class="chartsh"></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Revenue</h4>
                </div>
                <div class="card-body">
                  <div class="summary">
                    <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                      <div id="echart_area_line" class="chartsh"></div>
                    </div>
                    <div data-tab-group="summary-tab" id="summary-text">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h4>Quick Draft</h4>
                </div>
                <div class="card-body pb-0">
                  <div class="card-body sales-growth-chart">
                    <div id="echart_bar" class="chartsh"></div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="chart-title mb-1 text-center">
                    <h6>Total monthly Sales.</h6>
                  </div>
                  <div class="chart-stats text-center">
                    <a href="#"><i data-feather="arrow-up-circle" class="col-green"></i></a>
                    <span class="text-muted">20% high since the last year.</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
          <div class="card">
                <div class="card-body">
                  <div class="chart-title">
                    <p class="mb-3 text-muted pull-left text-sm">
                      <span class="text-success mr-2 font-20"><i class="fa fa-arrow-up"></i>
                        10%</span> <span class="text-nowrap">Since
                        last month</span>
                    </p>
                  </div>
                  <canvas id="chart-1"></canvas>
                  <div class="row text-center">
                    <div class="col-4 m-t-15">
                      <h5>91%</h5>
                      <p class="text-muted m-b-0">Online</p>
                    </div>
                    <div class="col-4 m-t-15">
                      <h5>8%</h5>
                      <p class="text-muted m-b-0">Offline</p>
                    </div>
                    <div class="col-4 m-t-15">
                      <h5>1%</h5>
                      <p class="text-muted m-b-0">NA</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      