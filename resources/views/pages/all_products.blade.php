

@extends('master')
@section('cat_content')
<!-- product category -->
  @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
   
          <div class="aa-product-catg-content">
          	@if ($products->total() > 0)
            <h2>Search Results</h2>
        	<p class="search-results-count"></p>
            
            <div class="aa-product-catg-head">
            {{ $products->total() }} result(s) for '{{ request()->input('query') }}'
              <!-- <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name</option>
                    <option value="3">Price</option>
                    <option value="4">Date</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div> -->
              
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
             
            </div>
            @else
            <h2>No Results Found for '{{ request()->input('query') }}'</h2>
        	
            @endif
            <div class="aa-product-catg-body">
            @if ($products->total() > 0)
              <ul class="aa-product-catg">

              	@foreach ($products as $product)
                <!-- start single product item -->
                <li style="height:408px;">
                  <figure>
                    <a class="aa-product-img" href="{{URL::to('/product-details/'.$product->id)}}"><img src="{{URL::to($product->product_image)}}" alt="img"></a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#">{{$product->product_name}}</a></h4>
                      <span class="aa-product-price">${{$product->product_price}}</span>
                      <p class="aa-product-descrip">{{$product->product_long_description}}</p>
                    </figcaption>
                    {!! Form::open(['url' => '/add-to-cart','method' => 'post']) !!} 
	                    <input  name="product_id" type="hidden" value="{{$product->id}}"/>
	                    <input  name="qty" type="hidden" value="1"/>
	                     <button type="submit" class="aa-add-to-cart-btn">Add To Cart</button>
                    {!! Form::close() !!}   
                    
                  </figure>                         
                 
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
                @endforeach
                                                      
              </ul>
              	
        	@endif
              <!-- quick view modal -->                  
              
              <!-- / quick view modal -->   
            </div>
            <div class="aa-product-catg-pagination">
            	{{ $products->appends(request()->input())->links() }}
             <!--  <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav> -->
            </div>
          </div>
   
  <!-- / product category -->
@endsection    