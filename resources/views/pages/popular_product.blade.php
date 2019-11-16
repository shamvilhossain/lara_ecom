@extends('master')
@section('popular_product')

<div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#sale" data-toggle="tab">On Sale</a></li>
                <li><a href="#popular" data-toggle="tab">Popular</a></li>
                <li><a href="#latest" data-toggle="tab">Latest</a></li>                    
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="sale">
                  <ul class="aa-product-catg aa-popular-slider">
             
                     <?php 
                        $sale_product_info=DB::table('tbl_product')
                          ->select('*')
                          ->where('is_sale',1)
                          ->where('publication_status',1)
                          ->latest()
                          ->limit(8)
                          ->get();

                          foreach ($sale_product_info as $v_product) {
                     ?>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{URL::to('/product-details/'.$v_product->id)}}"><img src="{{asset($v_product->product_image)}}" alt="Sale img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">{{$v_product->product_name}}</a></h4>
                          <span class="aa-product-price">${{$v_product->product_price}}</span><span class="aa-product-price"><del>${{$v_product->product_price + $v_product->product_discount}}</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>  
                  <?php } ?>
                  </ul>
                  <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / popular product category -->
                
                <!-- start featured product category -->
                <div class="tab-pane fade" id="popular">
                 <ul class="aa-product-catg aa-featured-slider">
                    <!-- start single product item -->

                    <?php 
                        $popular_product_info=DB::table('tbl_product')
                          ->select('*')
                          ->where('publication_status',1)
                          ->orderBy('view_count','desc')
                          ->limit(8)
                          ->get();

                          foreach ($popular_product_info as $v_product) {
                     ?>

                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{URL::to('/product-details/'.$v_product->id)}}"><img src="{{asset($v_product->product_image)}}" alt="Sale img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">{{$v_product->product_name}}</a></h4>
                          <span class="aa-product-price">${{$v_product->product_price}}</span><span class="aa-product-price"><del>${{$v_product->product_price + $v_product->product_discount}}</del></span>
                        </figcaption>
                      </figure>                    
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                     <!-- start single product item -->
                    <?php } ?>

                  </ul>
                  <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / featured product category -->

                <!-- start latest product category -->
                <div class="tab-pane fade" id="latest">
                  <ul class="aa-product-catg aa-latest-slider">
                    <!-- start single product item -->
                    <?php 
                        $latest_product_info=DB::table('tbl_product')
                          ->select('*')
                          ->where('publication_status',1)
                          ->latest()
                          ->limit(8)
                          ->get();

                          foreach ($latest_product_info as $v_product) {
                     ?>
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{URL::to('/product-details/'.$v_product->id)}}"><img src="{{asset($v_product->product_image)}}" alt="Sale img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">{{$v_product->product_name}}</a></h4>
                          <span class="aa-product-price">${{$v_product->product_price}}</span><span class="aa-product-price"><del>${{$v_product->product_price + $v_product->product_discount}}</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                      <?php } ?>
                                                                                                       
                  </ul>
                   <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / latest product category -->              
              </div>
            </div>
          </div> 
        </div>
   @endsection     