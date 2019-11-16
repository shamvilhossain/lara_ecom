@extends('admin.admin_master')
@section('main_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>
			<h3 style="color:green">
				<?php 
					$message=Session::get('message');
					if($message){
						echo $message;
						Session::put('mesage',null);
					}
				?>
			</h3>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						{!! Form::open(['url' => '/update-category','method' => 'post','name'=>'edit_category']) !!}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label"  for="typeahead">Category Name </label>
							  <div class="controls">
								<input type="text" name="category_name" value="{{$category_info->category_name}}">
								<input type="hidden" name="category_id" value="{{$category_info->id}}">
							
							  </div>
							</div>
							
         
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Category Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="category_description">{{$category_info->category_description}}</textarea>
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

			</div><!--/row-->
			<script type="text/javascript">
document.forms['edit_category'].elements['publication_status'].value='<?php echo $category_info->publication_status; ?>'
			</script>

@endsection   