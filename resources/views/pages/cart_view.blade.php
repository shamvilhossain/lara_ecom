@extends('master')

@section('cart_view')
<section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             {!! Form::open(['url' => '/update-cart','method' => 'post', 'id' => 'update_cart_form']) !!}  
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php 
                          $i=1;
                          $content = Cart::content();
                          foreach ($content as $v_contents) {  
                      ?>
                      
                      <tr>
                        <td><a class="remove" href="{{URL::to('/remove-from-cart/'.$v_contents->rowId)}}"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img width="50" height="50" src="{{$v_contents->options['image']}}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#">{{$v_contents->name}}</a></td>
                        <td>BDT {{$v_contents->price}}</td>
                        <td> <input  type="text" value="{{$v_contents->qty}}" name="qty[]" id="product_qty<?=$i?>"></td>
                        <td>BDT {{$v_contents->subtotal}}</td>
                          <input  type="hidden" value="{{$v_contents->rowId}}" name="cart_rowid[]">
                          <input  type="hidden" value="{{$v_contents->id}}" name="product_id<?=$i?>">
                          <input  type="hidden" value="{{$v_contents->name}}" name="product_name<?=$i?>">
                          <input  type="hidden" value="{{$v_contents->options['product_quantity']}}" name="old_product_quantity<?=$i?>">
                          
                      </tr>

                      <?php
                        $i++; 
                      } 
                      ?>
                      <!-- https://packagist.org/packages/gloudemans/shoppingcart -->
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <!-- <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Coupon">
                            <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                          </div> -->
                          <input  type="hidden" value="{{$i}}" name="counter" id="counter">
                          <input class="aa-cart-view-btn" type="submit" value="Update Cart">
                          
                        </td>
                      </tr>
                      </tbody>
                  </table>
                </div>
             {!! Form::close() !!} 
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Total</th>
                     <td>BDT {{Cart::total()}}</td>
                   </tr>
                   <tr>
                     <th>Vat 4.5%</th>
                     <td>
                       <?php 
                        $total = (double) str_replace(',','',Cart::total());
                        $vat= (($total * 4.5)/100);
                        echo 'BDT '.$vat;
                       ?>
                     </td>
                   </tr>
                   <tr>
                     <th>Grand Total</th>
                     <td>BDT {{$grand_total = $total + $vat}}

<?php Session::put('grand_total',$grand_total); ?>
                     </td>
                   </tr>
                 </tbody>
               </table>
               <?php 
                  $customer_id= Session::get('customer_id');
                  if($customer_id!=null){

               ?>
               <a href="{{URL::to('/payment')}}" class="aa-cart-view-btn">Proced to Checkout</a>
               <?php }else{ ?>
               <a href="{{URL::to('/customer-registration')}}" class="aa-cart-view-btn">Proced to Checkout</a>
               <?php } ?>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 @endsection  