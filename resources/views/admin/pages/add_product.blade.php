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

					@if(count($errors))
			            <div class="form-group">
			                <div class="alert alert-danger">
			                    <ul>
			                        @foreach($errors->all() as $error)
			                            <li>{{$error}}</li>
			                        @endforeach
			                    </ul>
			                </div>
			            </div>
			        @endif

					<div class="box-content">
						{!! Form::open(['url' => '/save-product','method' => 'post', 'enctype' => 'multipart/form-data']) !!}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Product Name </label>
							  <div class="controls">
								<input type="text" name="product_name" class="span6 typeahead" id="typeahead"  >
								
							  </div>
							</div>
							{{-- <div class="control-group">
							  <label class="control-label" for="date01">Date input</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date01" value="02/16/12">
							  </div>
							</div> --}}

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
								<input type="number" name="product_price" class="span6 typeahead" id="typeahead"  >
								
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Product Discount </label>
							  <div class="controls">
								<input type="number" name="product_discount" class="span6 typeahead" id="typeahead"  >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Product Quantity </label>
							  <div class="controls">
								<input type="number" name="product_quantity" class="span6 typeahead" id="typeahead"  >
								
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Reorder Label </label>
							  <div class="controls">
								<input type="number" name="reorder_level" class="span6 typeahead" id="typeahead"  >
								
							  </div>
							</div>

							<div class="control-group">
							  
							  <div class="controls">
							  	<label class="control-label" for="typeahead">Featured: <input type="checkbox" name="is_featured"></label>
							  </div>
							  
							  <div class="controls">
								<label class="control-label" for="typeahead">Sale: <input type="checkbox" name="is_sale"></label>
							  </div>
							  
							  <div class="controls">
								<label class="control-label" for="typeahead">Offer: <input type="checkbox" name="is_offer"> </label>
							  </div>

							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea name="product_short_description" class="cleditor" id="textarea2" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea name="product_long_description" class="cleditor" id="textarea2" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Main Image</label>
							  <div class="controls">
								<input name="product_image" class="input-file uniform_on" id="fileInput" type="file">
							  </div>
							</div>  

							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Side Image - 1</label>
							  <div class="controls">
								<input name="product_image_side_1" class="input-file uniform_on" id="fileInput" type="file">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Side Image - 2</label>
							  <div class="controls">
								<input name="product_image_side_2" class="input-file uniform_on" id="fileInput" type="file">
							  </div>
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
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						{!! Form::close() !!}

					</div>
				</div><!--/span-->
  @endsection   