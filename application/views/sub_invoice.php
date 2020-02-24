<section class="headingSpacer bg-img2">
    <div class="auto-container">
      <div class="tc-breadcrumb tc-contrast tc-breadcrumb-center">
        <h3 class="breadcrumb-title white_color"> Blog Style- 3</h3>
        <ul class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">pages</a></li>
          <li class="active"><span>Blog Style- 3</span></li>
        </ul>
      </div>
    </div>
  </section><div class="container">
    	<?php $id=$this->uri->segment(3);
    	//print_r($id);exit();
    	$this->db->where('id',$id);
    	$row= $this->db->get('customer_info')->row();
    	//print_r($row);?>
        <div class="row">
            <div class="col-lg-12" style="padding-top:50px;">
              <h3 style=" color: rgb(242, 0, 137);">Subscriber Invoice</h3>
                <!--<?php if($this->uri->segment(3)){
                //echo "Success";
                }?>--> 
                <div class="theme-card" style="margin-top:40px; width: 50%; align:center;">
                		<table class="table table-bordered table-hover">
                			<tr class="text-uppercase">
                				<th>Name</th>
                				<td><label><?php echo $row->customer_name;?></label></td>
                			</tr>
                			<tr class="text-uppercase">
                				<th>Father /Husband Name</th>
                				<td><label><?php echo $row->fname;?></label></td>
                			</tr>
                			
                			<tr class="text-uppercase">
                				<th>Mobile Number</th>
                				<td><label><?php echo $row->mobilenumber;?></label></td>
                			</tr>
                			<tr class="text-uppercase">
                				<th>Address </th>
                				<td><label><?php echo $row->current_address;?></label></td>
                			</tr>
                			<tr class="text-uppercase">
                				<th>Username</th>
                				<td><label><?php echo $row->username;?></label></td>
                			</tr>
                			<tr>
                				<th class="text-uppercase">Password</th>
                				<td><label><?php echo $row->password;?></label></td>
                			</tr>
                				<tr>
                				<th class="text-uppercase">Registration No</th>
                				<td><label><?php echo $row->id;?></label></td>
                			</tr>
                			<tr>
                			    <th class="text-uppercase">Registration Date</th>
                			    <td><lable><?php echo Date("d-m-y",strtotime($row->joining_date));?></lable></td>
                			</tr>
                				<tr>
                			    <th colspan="2">Congratulations your registration is Under Process.Please pay 1449 Rs for Activation</th>
                			</tr>
                				<tr>
                			    <th colspan="2"><span style="font-size:14px;color:red">Note :-</span><span style="color:red;font-size:12px;">Your registration will be automatically cancelled if you do not pay the mentioned amount within 12 hours.</span></th>
                			</tr>
                			<tr>
                			    <th colspan="2"><a href="<?php echo base_url();?>index.php/auth/signin">login Panel</a></th>
                			</tr>
                		</table>
               </div>
            </div>
        </div>
    </div>