<?php 
    class tree extends CI_Model{
        
    	
    	function getroitot(){
    		$i=0;
    		$date2  = date('Y-m-d');
    		$date1  =date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date2) ) ));
    	$cinfo=	$this->db->get("customer_info");
    		foreach($cinfo->result() as $row):
    		$leftv = $this->db->query("select * from silver_tree where  silver_tree.rightjoiner='$row->id' and DATE(silver_tree.rightjoiner_date) < '$date1'")->num_rows();
    		$rightv= $this->db->query("select * from silver_tree where  silver_tree.leftjoiner='$row->id' and DATE(silver_tree.leftjoiner_date) < '$date1' ")->num_rows();
    		if(($leftv+$rightv)>9){
    			$i++;
    		}
    		endforeach;
    		return $i;
    	}
        function getautopoolamount($leftobject, $rightobject,$level,$cid){
            $this->db->where("c_id",$cid);
    			$fty4 =$this->db->get("autopool_details")->row();
            $this->db->where("id",$level+1);
           $getper =  $this->db->get("auto_pool")->row();
           
            $i=0;
            if($leftobject->num_rows()>0){
                //print_r($leftobject);
               foreach($leftobject->result() as $lft):
                  echo $lft->left;
                    $lefttotal=$this->db->query("select * from silver_tree where  silver_tree.leftjoiner='$lft->left' ");
                    $righttotal= $this->db->query("select * from silver_tree where  silver_tree.rightjoiner='$lft->left'");
                    if(($lefttotal->num_rows()+$righttotal->num_rows())>2){
                    $i++;
                    }
           
                     endforeach;
            }
                     if($rightobject->num_rows()>0){
                    foreach($rightobject->result() as $rft):
                        echo $rft->right;
                    $lefttotal=$this->db->query("select * from silver_tree where  silver_tree.leftjoiner='$rft->right' ");
                    $righttotal= $this->db->query("select * from silver_tree where  silver_tree.rightjoiner='$rft->right'");
                    if(($lefttotal->num_rows()+$righttotal->num_rows())>2){
                    $i++;
                    }
                    endforeach;
                     }
                     
                     echo "----".$cid."----".$i."<br>";
                     if($i>2){
                         echo "Rahul-".$i;
                         $upl['level'] =$level+1; 
                         $upl['amount'] = $fty4+$getper->row()->pool_amount;
                         $this->db->where("c_id",$cid);
                         $this->db->update("autopool_details",$upl);
                         	$daybookdata = array(
    			        "invoice_no"=>$invoice_number,
    			        "paid_to"=>$cid,
    			        "paid_from"=>"System",
    			        "transaction_type"=>2,
    			        "debit_credit"=>1,
    			        "date1"=>date("Y-m-d H:s:i"),
    			        "amount"=>$getper->row()->pool_amount
    			    
    			    );
    			    
    			    $this->db->insert("inner_daybook",$daybookdata);
                     }
            }
        
        
        public function selectPosition($joid,$joind){
        	$getrecord = $this->db->get("silver_tree");
        	foreach($getrecord->result() as $gv):
        		if(!$gv->left){
        		$upd = array(
        				"left"=>$joid,
        				"leftjoiner"=>$joind,
        				"leftjoiner_date"=>date("Y-m-d")
        		);
        		$this->db->where("c_id",$gv->c_id);
        		$this->db->update("silver_tree",$upd);
        		$insertd = array(
        				"c_id"=>$joid
        		);
        		$this->db->insert("silver_tree",$insertd);
        		$this->db->insert("silver_mbalance",$insertd);
        		$datap["parent_id"] = $gv->c_id;
        		$this->db->where("id",$joid);
        		$this->db->update("customer_info",$datap);
        		
        		return true;
        		break;
        		}
        		if(!$gv->right){
        			$upd = array(
        					"right"=>$joid,
        					"rightjoiner"=>$joind,
        					"rightjoiner_date"=>date("Y-m-d")
        			);
        			$this->db->where("c_id",$gv->c_id);
        			$this->db->update("silver_tree",$upd);
        			$insertd = array(
        					"c_id"=>$joid
        			);
        			$this->db->insert("silver_tree",$insertd);
        			$this->db->insert("silver_mbalance",$insertd);
        			$datap["parent_id"] = $gv->c_id;
        			$this->db->where("id",$joid);
        			$this->db->update("customer_info",$datap);
        			return true;
        			break;
        		}
        	endforeach;
        }
        
        
        
        
        ///
    	public function selectlegleft($data1){
    	
    		$this->db->where("c_id", $data1);
    		$rowdata = $this->db->get("silver_tree")->row();
    		if ($rowdata) {
    	
    			if ($rowdata->left) {
    				$returndata= $this->selectlegleft($rowdata->left);
    			} else {
    				$returndata= $rowdata->c_id;
    	
    			}
    
    			return $returndata;
    	
    		}
    	
    	}
    	 public function countlegleft($cid,$count){
       
        $this->db->where('c_id', $cid);
        $leftjoiner = $this->db->get('silver_tree');
        if($leftjoiner->num_rows()>0){
           
            $query2=$leftjoiner->row();
                
                if($query2->left){
                    $this->db->where("id", $query2->left);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1->status){
                        $count=$count+1;
                        //echo $query2->root_left."<br>";
                    }
                    $left=$query2->left;
                   
                    $count = $this->countlegleft($left,$count);
                    
                    //$this->db->where("id", $right);
                    //$cid = $this->db->get("customer_info")->row();
                    
                }
                if($query2->right){
                    $this->db->where("id", $query2->right);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1->status){
                        $count=$count+1;
                        //echo $query2->root_right."<br>";
                    }
                    
                    $right=$query2->right;
                   
                    //$count=$count+1;
                    $count = $this->countlegleft($right,$count);
                    
                }
            
            //if($rightjoiner->num_rows()>0){
            //foreach ($rightjoiner->result() as $query2)
            //{
            // $right=$query2->root;
            //$this->getRightData($right);
            //$this->db->where("id", $right);
            //$cid = $this->db->get("customer_info")->row();
            
        }
        return $count;
    }
    	
    		 public function countlegrit($cid,$count){
       
        $this->db->where('c_id', $cid);
        $leftjoiner = $this->db->get('silver_tree');
        if($leftjoiner->num_rows()>0){
          
            $query2=$leftjoiner->row();
                
                if($query2->left){
                    $this->db->where("id", $query2->left);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1->status){
                        $count=$count+1;
                        //echo $query2->root_left."<br>";
                    }
                    $left=$query2->left;
                   
                    $count = $this->countlegleft($left,$count);
                    
                    //$this->db->where("id", $right);
                    //$cid = $this->db->get("customer_info")->row();
                    
                }
                if($query2->right){
                    $this->db->where("id", $query2->right);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1->status){
                        $count=$count+1;
                        //echo $query2->root_right."<br>";
                    }
                    
                    $right=$query2->right;
                   
                    //$count=$count+1;
                    $count = $this->countlegleft($right,$count);
                    
                }
            
            //if($rightjoiner->num_rows()>0){
            //foreach ($rightjoiner->result() as $query2)
            //{
            // $right=$query2->root;
            //$this->getRightData($right);
            //$this->db->where("id", $right);
            //$cid = $this->db->get("customer_info")->row();
            
        }
        return $count;
    }
    	
    	
    	
    	public function updatelevel($id){
    		$this->db->where("id >",$id);
    		$grtad = $this->db->get("autopool_details");
    		if($grtad->num_rows()>0){
    			$newp = $grtad->num_rows();
    			$aumaster=$this->db->get("auto_pool");
    			foreach($aumaster->result() as $amp):
    			if($amp->person_no > $newp){
    				$leveln =$amp->id;
    				break;
    			}
    			endforeach;
    			$this->db->where("id",$id);
    			$pdfg= $this->db->get("autopool_details")->row();
    			$this->db->select_sum("pool_amount");
    			$this->db->where("id <",$leveln);
    			$paisa = $this->db->get("auto_pool");
    			$dup = array(
    				"level"=>$leveln-1,
    				"pool_income"=>	$paisa->row()->pool_amount
    			);
    			$this->db->where("id",$id);
    			$this->db->update("autopool_details",$dup);
    		}else{
    			
    		}
    			
    		
    	}
    	
    	public function getPair($table,$cid){
    		$this->db->where("c_id",$cid);
    		$pair = $this->db->get($table);
    		return $pair;
    		
    	}
    	
    	public function update($table,$data,$cid){
    		$this->db->where("c_id",$cid);
    		$this->db->update($table,$data);
    		return true;
    	}
    	public function insert($table,$data){
    		$this->db->insert($table,$data);
    		return true;
    	}
    	
    	public function selectlegright($data1){
    		// $returndata = array();
    	
    		$this->db->where("c_id", $data1);
    		$rowdata = $this->db->get("silver_tree")->row();
    		if ($rowdata) {
    			if ($rowdata->right) {
    				$returndata= $this->selectlegright($rowdata->right);
    			} else {
    				$returndata = $rowdata->c_id;
    			}
    			return $returndata;
    		}
    	}
    	
    	public function position($data, $id ,$po)
    	{
    			$this->db->where("c_id", $id);
    			$fty =$this->db->get("silver_tree")->row();
     		$dt2=	$data[$po];
    	
    
    			if(!$fty->$po){
    			  
    				$this->db->where("c_id", $id);
    				$this->db->update("silver_tree", $data);
    			$datainsert = array(
    					"c_id"=>$data[$po]
    			);
    			$this->db->insert("silver_tree",$datainsert);
    			$this->db->insert("silver_mbalance",$datainsert);
    			}
    			return true;
    	}
    	public function getpoolposition($cid){
    		$this->db->where("c_id",$cid);
    			$fty4 =$this->db->get("autopool_details");
    			if($fty4->num_rows()<1){
    			    
    			    $this->db->where("id",$cid);
    				$fty1 =$this->db->get("customers_info")->row()->joiner_id;
    				
    				
    				
    				if($fty1->num_rows()>0){
    			foreach($fty1->result() as $fty):
    			$this->db->where("c_id",$fty->c_id);
    			$cyp  =$this->db->get("autopool_details")->row();
    			
    			if(!$cyp->left){
    				$upv =array(
    					"left"=>$cid	
    				);
    				$this->db->where("c_id",$cyp->c_id);
    				$this->db->update("autopool_details",$upv);
    				$dataa =array(
    						"c_id" =>$cid,
    						"level"	=>0,
    						"pool_income"	=>0,
    						"roi_income"	=>0,
    						"date"	=>date("Y-m-d H:i:s")
    				);
    				$this->db->insert("autopool_details",$dataa);
    				return true;
    				break;
    			}else{
    				if(!$cyp->mid){
    					$upv =array(
    					"mid"=>$cid	
    				);
    				$this->db->where("c_id",$cyp->c_id);
    				$this->db->update("autopool_details",$upv);
    				$dataa =array(
    						"c_id" =>$cid,
    						"level"	=>0,
    						"pool_income"	=>0,
    						"roi_income"	=>0,
    						"date"	=>date("Y-m-d H:i:s")
    				);
    				$this->db->insert("autopool_details",$dataa);
    				return true;
    				break;
    				}else{
    					if(!$cyp->right){
    						$upv =array(
    					"right"=>$cid	
    				);
    				$this->db->where("c_id",$fty->c_id);
    				$this->db->update("autopool_details",$upv);
    				$dataa =array(
    						"c_id" =>$cid,
    						"level"	=>0,
    						"pool_income"	=>0,
    						"roi_income"	=>0,
    						"date"	=>date("Y-m-d H:i:s")
    				);
    				$this->db->insert("autopool_details",$dataa);
    				return true;
    				break;
    				}
    			}
    	}
    	
    		
    	endforeach;
    	}else{
    		$dataa =array(
    				"c_id" =>$cid,
    				"level"	=>0,
    				"pool_income"	=>0,
    				"roi_income"	=>0,
    				"date"	=>date("Y-m-d H:i:s")
    		);
    		$this->db->insert("autopool_details",$dataa);
    		return true;
    	}
    	}
    }
    
    public function getPoolCountData($cid,$count){
    	 
    	$this->db->where('c_id', $cid);
    	$leftjoiner = $this->db->get("autopool_details");
    	if($leftjoiner->num_rows()>0){
    		 
    		$query2=$leftjoiner->row();
   
    		if($query2->left){
    				$count=$count+1;
    			$left=$query2->left;
    			$count = $this->getPoolCountData($left,$count);
    		}
    		if($query2->mid){
    			$count=$count+1;
    			$mid=$query2->mid;
    			$count = $this->getPoolCountData($mid,$count);
    		
    		}
    		if($query2->right){
    				$count=$count+1;
    			$right=$query2->right;
    			$count = $this->getPoolCountData($right,$count);
    
    		}
    
    	}
    	return $count;
    }
    
    
    function mydownline($id,$pos,$table,$tabv){
    	if($tabv==1){
    $this->db->where($pos, $id);
    $dt= $this->db->get($table);
    return $dt;
    	}
    }
   
    
   public function getLeftCountData($cid,$count,$tablename){
       
        $this->db->where('c_id', $cid);
        $leftjoiner = $this->db->get($tablename);
        if($leftjoiner->num_rows()>0){
           
            $query2=$leftjoiner->row();
                
                if($query2->left){
                    $this->db->where("id", $query2->left);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1->status){
                        $count=$count+1;

                        //echo $query2->root_left."<br>";
                    }
                    $left=$query2->left;
                   

                    $count = $this->getLeftCountData($left,$count,$tablename);
                    
                    //$this->db->where("id", $right);
                    //$cid = $this->db->get("customer_info")->row();
                    
                }
                if($query2->right){

                    $this->db->where("id", $query2->right);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1->status){
                        $count=$count+1;

                    }
                    
                    $right=$query2->right;
                   
                    //$count=$count+1;
                    $count = $this->getLeftCountData($right,$count,$tablename);
                    
                }
            
           
            
        }
        return $count;
    }
    
    public function getRightData($cid,$count){
       
        $this->db->where('c_id', $cid);
        $leftjoiner = $this->db->get('silver_tree');
         $this->db->where("id", $cid);
                    $dataorg = $this->db->get("customer_info")->row();
        
        if($leftjoiner->num_rows()>0){
            foreach ($leftjoiner->result() as $query2)
            {
               
                if($query2->right){
                   
                    $this->db->where("id", $query2->right);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1){
                          if($data1->status==1){ $status= "Active";}else{$status="Inactive";}
                       /* echo $data1->username."[".$data1->customer_name."]<br>";
						echo $data1->joining_date."[".$data1->mobilenumber."]<br>";
						echo $data1->amount."[".$data1->position."]<br>";*/
						echo 	"<tr >
						
								 <td>". $data1->customer_name. "[".$data1->username."]"."</td>
								 <td>". $dataorg->customer_name. "[".$dataorg->username."]"."</td>
								  <td>".$count."</td>
								  <td>". $status."</td>
								   <td>". $data1->active_date."</td>
								
							</tr>
							";
                    }
                    $right=$query2->right;
                    $this->getRightData($right,$count);
                    
                }
                 if($query2->left){
                    
                    $this->db->where("id", $query2->left);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1){
                        if($data1->status==1){ $status= "Active";}else{$status="Inactive";}
						echo 	"<tr>
						
								 <td>". $data1->customer_name. "[".$data1->username."]"."</td>
								 <td>". $dataorg->customer_name. "[".$dataorg->username."]"."</td>
								  <td>".$count."</td>
								  <td>". $status."</td>
								   <td>". $data1->active_date."</td>
								
							</tr>
							";
                    }
                    $right=$query2->left;
                   $this->getLeftData($right,$count);
                 }
            }
        }
          
        
    }
    
    public function getLeftData($cid,$count){
       
        $this->db->where('c_id', $cid);
        $leftjoiner = $this->db->get('silver_tree');
         $this->db->where("id", $cid);
                    $dataorg = $this->db->get("customer_info")->row();
        
        
        if($leftjoiner->num_rows()>0){
            foreach ($leftjoiner->result() as $query2)
            {
                
                if($query2->left){
                  
                    $this->db->where("id", $query2->left);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1){
                        if($data1->status==1){ $status= "Active";}else{$status="Inactive";}
						echo 	"<tr>
						
								 <td>". $data1->customer_name. "[".$data1->username."]"."</td>
								 <td>". $dataorg->customer_name. "[".$dataorg->username."]"."</td>
								  <td>".$count."</td>
								  <td>". $status."</td>
								   <td>". $data1->active_date."</td>
								
							</tr>
							";
                    }
                    $right=$query2->left;
                   $this->getLeftData($right,$count);
                  
                    
                }
                 if($query2->right){
                    
                    $this->db->where("id", $query2->right);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1){
                        if($data1->status==1){ $status= "Active";}else{$status="Inactive";}
                        
                       /* echo $data1->username."[".$data1->customer_name."]<br>";
						echo $data1->joining_date."[".$data1->mobilenumber."]<br>";
						echo $data1->amount."[".$data1->position."]<br>";*/
					
							echo 	"<tr>
						
								 <td>". $data1->customer_name. "[".$data1->username."]"."</td>
								 <td>". $dataorg->customer_name. "[".$dataorg->username."]"."</td>
								  <td>".$count."</td>
								  <td>". $status."</td>
								 <td>". $data1->active_date."</td>
							</tr>";
                    }
                    $right=$query2->right;
                    $this->getRightData($right,$count);
                    
                }
            }
          
            
        }
    }
		
    public function getpoolt($cid){
    	$this->db->where("c_id",$cid);
    $gpd1=	$this->db->get("autopool_details");
    	if($gpd1->num_rows()>0){
    		$gpd=$gpd1->row();
    		echo '<table><tr><td>'.$gpd->c_id.'</td></tr>';
    		if($gpd->left){
    			echo '<tr><td>'.$gpd->left.'</td>';
    			$this->getpoolt($gpd->left);
    		}
    		if($gpd->mid){
    			echo '<td>'.$gpd->mid.'</td>';
    			$this->getpoolt($gpd->mid);
    		}
    		if($gpd->right){
    			echo '<td>'.$gpd->right.'</td></td>';
    			$this->getpoolt($gpd->right);
    		}
    		echo '</table><br>';
    	}
    }
    
    
    }
?>