@extends('admin.admin_master')
@section('main_content')
<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>

					<h3 style="color:green">
						<?php 
							$message=Session::get('message');
							if($message){
								echo $message;
								Session::put('message',null);
							}
						?>
					</h3>

					<div class="box-content">
						{!! Form::open(['url' => '/update-product','method' => 'post', 'enctype' => 'multipart/form-data', 'name'=>'edit_product' ]) !!}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Product Name </label>
							  <div class="controls">
								<input type="text" name="product_name" class="span6 typeahead" id="typeahead"  value="{{$product_info->product_name}}">
								<input type="hidden" name="product_id"   value="{{$product_info->id}}">
								
							  </div>
							</div>
							

							<div class="control-group">
							  <label class="control-label" for="date01">Category Name</label>
							  <div class="controls">
								<select name="category_id">
									<option>Select Category</option>
									<?php foreach($category_info as $v_category){?>
									<option value="{{$v_category->id}}">{{$v_category->category_name}}</option>
									<?php } ?>
									
								</select>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Manufacturer Name</label>
							  <div class="controls">
								<select name="manufacturer_id">
									<option>Select Manufacturer</option>
									<?php foreach($manufacturer_info as $v_manufacturer){?>
									<option value="{{$v_manufacturer->id}}">{{$v_manufacturer->manufacturer_name}}</option>
									<?php } ?>
									
								</select>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Product Price </label>
							  <div class="controls">
								<input type="number" name="product_price" class="span6 typeahead" id="typeahead"  value="{{$product_info->product_price}}">
								
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Product Quantity </label>
							  <div class="controls">
								<input type="number" name="product_quantity" class="span6 typeahead" id="typeahead"  value="{{$product_info->product_quantity}}">
								
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Reorder Label </label>
							  <div class="controls">
								<input type="number" name="reorder_level" class="span6 typeahead" id="typeahead" value="{{$product_info->reorder_level}}">
								
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Featured: </label>
							  <div class="controls">
							  <?php if($product_info->is_featured==1){
							  		echo '<input type="checkbox" name="is_featured" checked>';
							  	}else{
							  		echo '<input type="checkbox" name="is_featured">';
							  	}?>
								
								
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea name="product_short_description" class="cleditor" id="textarea2" rows="3" >{{$product_info->product_short_description}}</textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea name="product_long_description" class="cleditor" id="textarea2" rows="3" >{{$product_info->product_long_description}}</textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Image</label>
							  <div class="controls">
								<input name="product_image" class="input-file uniform_on" id="fileInput" type="file">
							  </div>
							</div>

							<div>
								<img src="{{asset($product_info->product_image)}}" style="width:50px;height:50px;position:relative;bottom:25px;left:255px;">
								<input type="hidden" name="product_image_url" value="{{$product_info->product_image}}">
							</div>  

							<div class="control-group">
							  <label class="control-label" for="fileInput">Publication Status</label>
							  <div class="controls">
								<select name="publication_status">
									<option>Select Status</option>
									<option value="0">Unpublshed</option>
									<option value="1">Published</option>
									
								</select>
							  </div>
							</div>         
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						{!! Form::close() !!}

					</div>
				</div><!--/span-->

		<script type="text/javascript">
			document.forms['edit_product'].elements['category_id'].value='<?php echo $product_info->category_id; ?>'
			document.forms['edit_product'].elements['manufacturer_id'].value='<?php echo $product_info->manufacturer_id; ?>'
			document.forms['edit_product'].elements['publication_status'].value='<?php echo $product_info->publication_status; ?>'
		</script>

  @endsection   