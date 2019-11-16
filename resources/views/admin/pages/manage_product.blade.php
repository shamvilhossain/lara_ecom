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
								  <th>Product Id</th>
								  <th>Product Name</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php 
						  foreach ($product_info as $v_product) {
						  
						  ?>
							<tr>
								<td><?php echo $v_product->id; ?></td>
								<td><?php echo $v_product->product_name; ?></td>
								
								
								<td class="center">
								<?php if($v_product->publication_status==1){ ?>
									<span class="label label-success">Published</span>
								<?php } else{ ?>
									<span class="label label-important">Unpublished</span>
								<?php } ?>	
								</td>
								
								<td class="center">
									<?php if($v_product->publication_status==1){ ?>
									<a class="btn btn-danger" href="{{URL::to('/unpublish-product/'.$v_product->id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									<?php }else{ ?>
									<a class="btn btn-success" href="{{URL::to('/publish-product/'.$v_product->id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									<?php } ?>
									<a class="btn btn-info" href="{{URL::to('/edit-product/'.$v_product->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-product/'.$v_product->id)}}" onclick="return check_delete()">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php } ?>
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
  @endsection   