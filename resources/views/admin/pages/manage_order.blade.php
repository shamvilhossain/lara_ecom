@extends('admin.admin_master')
@section('main_content')

<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Sl</th>
								  <th>Order Date</th>
								  <th>Customer Name</th>
								  <th>Address</th>
								  <th>Contact</th>
								  <th>Product x Unit</th>
								  <th>Price</th>
								  <th>Payment Type</th>
								  <th>Payment Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php 
						  $i=1;
						  $payment_type='';
						  foreach ($order_info as $v_order) {
						  $product_names= explode(",",$v_order->product_names);
						  $qtys= explode(",",$v_order->qtys);
						  $prices= explode(",",$v_order->prices);
						  $j=0;
						  if($v_order->payment_type=='cash_on_delivery'){
						  	$payment_type='Cash on Delivery';
						  }else{
						  	$payment_type='Paypal';
						  }
						  ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo date("d-M-y", strtotime($v_order->created_at)); ?></td>
								<td><?php echo $v_order->first_name; ?></td>
								<td><?php echo $v_order->address; ?></td>
								<td><?php echo $v_order->mobile; ?></td>
								<td>
								<?php foreach($product_names as $p_name){ 
									echo $p_name.' x '.$qtys[$j].'<BR>';
								} ?>	
								</td>
								<td>
									<?php foreach($prices as $pri){ 
									echo $pri.'<BR>';
								} ?>
								</td>
								<td><?php echo $payment_type; ?></td>
								

								<td class="center">
								<?php if($v_order->payment_status=='Pending'){ ?>
									<span class="label label-important">Pending</span>
								<?php } else{ ?>
									<span class="label label-success">Done</span>
								<?php } ?>	
								</td>
								
								
								<td class="center">
									<?php if($v_order->payment_status=='Pending'){ ?>
									<a class="btn btn-success" href="{{URL::to('/confirm-payment/'.$v_order->payment_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									<?php }else{ ?>
									
									<?php } ?>

									<?php if($v_order->order_status!=2){ ?>
									<a class="btn btn-success" href="{{URL::to('/approve-order/'.$v_order->order_id)}}">
										<i class="halflings-icon white check"></i>  
									</a>
									<?php } ?>
									
									<?php if($v_order->order_status!=2){ ?>
									<a class="btn btn-danger" href="{{URL::to('/cancel-order/'.$v_order->order_id)}}" onclick="return check_delete()">
										<i class="halflings-icon white trash"></i> 
									</a>
									<?php } ?>
								</td>
							</tr>
							<?php
							$i++; 
							} 
							?>
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
  @endsection   